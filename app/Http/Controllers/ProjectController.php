<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Project;
use App\Task;
use App\Project_user;
use App\Project_file;
use App\Attestation;
use App\Form_file;
use App\Form_sign;
use App\Project_form;
use DateTime;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $id1 = Auth::id();
        $projects = Project::all();
        foreach ($projects as $key => $value) {
            $poc = User::find($value->poc);
            $value->pocname = $poc->name;
            $cco = User::find($value->cco);
            $value->cconame = $cco->name;
            if($id1 == $poc->id || $id1 == 1)
            {
                $value->can_edit = 1;
                $value->can_view = 1;
                if($id1 == 1)
                    $value->can_delete = 1;
                else
                    $value->can_delete = 0;
            }
            elseif($id1 == $cco->id)
            {
                $value->can_edit = 0;
                $value->can_view = 1;
                $value->can_delete = 0;
            }
            else
            {
                $project_users = Project_user::where('project_id', $value->id)->get();
                foreach ($project_users as $project_userkey => $project_user) 
                {
                    if($project_user->user_id == $id1)
                    {
                        $value->can_edit = 0;
                        $value->can_view = 1;
                        $value->can_delete = 0;
                    }
                    else
                    {
                        $value->can_edit = 0;
                        $value->can_view = 0;
                        $value->can_delete = 0;
                    }
                }
            }

        }
        if($id1 == 1)
        {
            $projects->can_create = 1;
        }
        else
        {
            $projects->can_create = 0;
        }
        //dd($projects);
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id1 = Auth::id();
        $users = User::all();
        if($id1 == 1)
        {
            return view('projects.create', compact('users', 'can_create'));
        }
        else
        {
            return view('errors.401');
        }        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd(request()->all());
        $this->validate($request, array(
            'name'=> 'required|max:20',                        
            'description'=> 'required|max:191',
            'poc'=> 'numeric|min:1',
            'cco'=> 'numeric|min:1',
            'duedate'=> 'required|date'
        ));
        $project = new Project;
        $project->name = $request->name;
        $project->description = $request->description;
        $project->poc = $request->poc;
        $project->cco = $request->cco;
        $project->duedate = $request->duedate;

        $user1 = User::findOrFail($request->poc);
        $user1->roles()->sync(2);

        $user2 = User::findOrFail($request->cco);
        $user2->roles()->sync(3);



        $project->save();
        return redirect()->route('projects.index')->with('success', 'You have successfully created Project');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id1 = Auth::id();
        $now = new \DateTime();
        $project = Project::find($id);
        $poc = User::find($project->poc);
        $project->pocname = $poc->name;
        $cco = User::find($project->cco);
        $project->cconame = $cco->name;

        $project_users = Project_user::where('project_id', $id)->select('user_id')->get();
        $admin = 1;
        $users = User::whereNotIn('id', $project_users)->where('id', '<>', $admin)->get();
        $selected_users = User::whereIn('id', $project_users)->get();

        //dd($selected_users, $users);

        
        
        if($id1 == $poc->id || $id1 == 1)
        {
            $project->can_edit = 1;
            $project->can_view = 1;
            $project->can_delete = 1;
            $tasks = Task::where('project_id', $id)->get(); 
        }
        elseif($id1 == $cco->id)
        {
            $project->can_edit = 0;
            $project->can_view = 1;
            $project->can_delete = 0;
            $tasks = Task::where('project_id', $id)->where('assignee', $id1)->get(); 
        }
        else
        {
            $project_users = Project_user::where('project_id', $project->id)->get();
            foreach ($project_users as $project_userkey => $project_user) 
            {
                if($project_user->user_id == $id1)
                {
                    $project->can_edit = 0;
                    $project->can_view = 1;
                    $project->can_delete = 0;
                }
                else
                {
                    $project->can_edit = 0;
                    $project->can_view = 0;
                    $project->can_delete = 0;
                }
            }
            $tasks = Task::where('project_id', $id)->where('assignee', $id1)->get(); 
        }

        foreach ($tasks as $key => $value) {
            $project1 = Project::find($value->project_id);
            $value->projectname = $project1->name;
            if($value->status == 1)
            {
                $value->status1 = 'pending';
            }
            elseif($value->status == 2)
            {
                $value->status1 = 'initiated';
            }
            elseif($value->status == 3)
            {
                $value->status1 = 'completed';
            }
            else
            {
                $value->status1 = 'no status';
            }
            $assigned = User::find($value->assignee);
            $value->assignedto = $assigned->name;
            $managed = User::findOrFail($value->responsible);
            $value->managedby = $managed->name;

            if($id1 == 1)
                $value->admin = 1;
            if($project1->poc == $id1)
                $value->poc = 1;
            if($project1->cco == $id1)
                $value->cco = 1;

            if(Project_user::where('project_id', $project1->id)->where('user_id', $id1)->exists())
                $value->user = 1;
            else
                $value->user = 0;


            $date1 = new DateTime($value->duedate);
            $d = date_diff($now, $date1);
            //dd($now, $date1, $d, $d->days);
            if($d->days > 3)
                $value->color = 3;
            if($d->days <= 3)
                $value->color = 2;
            if($d->invert)
                $value->color = 1;
        }
        
        $files = Project_file::where('project_id', $id)->get();

        if(Project_form::where('project_id', $id)->exists())
        {
            $attestation = Project_form::where('project_id', $id)->first();
        }
        else
        {
            $attestation = Attestation::find(3);
        }
        $form_files = Form_file::where('project_id', $id)->get();
        
        //dd($project);
        return view('projects.show', compact('project', 'tasks', 'users', 'selected_users', 'files', 'attestation', 'form_files'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id1 = Auth::id();
        $users = User::all();
        $project = Project::find($id);
        if($id1 == $project->poc || $id1 == 1)
        {
            return view('projects.edit', compact('users', 'project'));
        }
        else
        {
            return view('errors.401');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd(request()->all());
        $this->validate($request, array(
            'name'=> 'required|max:20',                        
            'description'=> 'required|max:191',
            'poc'=> 'numeric|min:1',
            'cco'=> 'numeric|min:1',
            'duedate'=> 'required|date'
        ));
        $project = Project::find($id);
        $project->name = $request->name;
        $project->description = $request->description;
        $project->poc = $request->poc;
        $project->cco = $request->cco;

        /*$user1 = User::findOrFail($request->poc);
        $user1->roles()->sync(2);

        $user2 = User::findOrFail($request->cco);
        $user2->roles()->sync(3);*/

        
        $project->duedate = $request->duedate;
        $project->save();
        return redirect()->route('projects.index')->with('success', 'You have successfully updated Project');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
