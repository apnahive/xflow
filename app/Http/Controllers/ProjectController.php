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
use App\Form_section;
use App\Form_initial;
use App\User_form;
use DateTime;
use RealRashid\SweetAlert\Facades\Alert;
use Mail;
use App\Mail\Project_created;
use App\Mail\Project_editted;

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
        $checkadmin = User::find($id1);        
        $checkadmins = $checkadmin->hasRole('Admin');
        //$selected_users = Project_user::where('user_id', $id1)->get(); 
        
        $projects = Project::paginate(15);
        /*if($id1 == 1)
            
        else
        {
            $selected_projects = Project::where('poc', $id1)->orWhere('cco', $id1)->select('id')->get();

        }*/
        foreach ($projects as $key => $value) {
            $poc = User::find($value->poc);
            $value->pocname = $poc->name;
            $cco = User::find($value->cco);
            $value->cconame = $cco->name;
            if($id1 == $poc->id || $checkadmins)
            {
                $value->can_edit = 1;
                $value->can_view = 1;
                if($checkadmins)
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
        if($checkadmins)
        {
            $projects->can_create = 1;
        }
        else
        {
            $projects->can_create = 0;
        }
        //dd(Auth::user()->hasPermissionTo('client view'));
        /*$permissions = $checkadmins->permissions;
        dd($permissions);*/
        if (Auth::user()->hasPermissionTo('client view'))
            return view('projects.index', compact('projects'));
        else
            return view('errors.401');
    }

    public function sort($feild, $type)
    {
        $id1 = Auth::id();
        $checkadmin = User::find($id1);        
        $checkadmins = $checkadmin->hasRole('Admin');
        //$selected_users = Project_user::where('user_id', $id1)->get(); 
        
        $projects = Project::orderBy($feild, $type)->paginate(15);
        /*if($id1 == 1)
            
        else
        {
            $selected_projects = Project::where('poc', $id1)->orWhere('cco', $id1)->select('id')->get();

        }*/
        foreach ($projects as $key => $value) {
            $poc = User::find($value->poc);
            $value->pocname = $poc->name;
            $cco = User::find($value->cco);
            $value->cconame = $cco->name;
            if($id1 == $poc->id || $checkadmins)
            {
                $value->can_edit = 1;
                $value->can_view = 1;
                if($checkadmins)
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
        if($checkadmins)
        {
            $projects->can_create = 1;
        }
        else
        {
            $projects->can_create = 0;
        }
        //dd($projects);
        if (Auth::user()->hasPermissionTo('client view'))
            return view('projects.index', compact('projects'));
        else
            return view('errors.401');
        //return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id1 = Auth::id();
        $checkadmin = User::find($id1);        
        $checkadmins = $checkadmin->hasRole('Admin');
        //$users = User::all();
        //dd($users);
        $useradmin = User::role('Admin')->select('id')->get();        
        $users = User::where('verified', 1)->whereNotIn('id', $useradmin)->get();
        if($checkadmins)
        {
            if (Auth::user()->hasPermissionTo('client create'))
                return view('projects.create', compact('users', 'can_create'));
            else
                return view('errors.401');
            
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
        $this->validate($request, [
            'name'=> 'required|max:191', /*limit increased on client's request -samar*/                       
            'description'=> 'required|max:2048',
            'poc'=> 'numeric|min:1',
            'cco'=> 'numeric|min:1',
            'duedate'=> 'required|date_format:Y-m-d',            
            ],
            [
                'poc.min' => 'Please choose a user.',
                'cco.min' => 'Please choose a user.',                
            ]
        );
       
        //dd('Validated');
        $project = new Project;
        $project->name = $request->name;
        $project->description = $request->description;
        $project->poc = $request->poc;
        $project->cco = $request->cco;
        $project->duedate = $request->duedate;

        $user1 = User::findOrFail($request->poc);
        //$user1->roles()->sync(2);

        $user2 = User::findOrFail($request->cco);
        //$user2->roles()->sync(3);



        $project->save();


        //dd('test');
        Mail::to($user1['email'])->send(new Project_created($user1, $project));
        Mail::to($user2['email'])->send(new Project_created($user2, $project));
        //dd('test');

        Alert::success('Success', 'You have successfully created Project')->showConfirmButton('Ok','#3085d6')->autoClose(15000);
        return redirect()->route('projects.index')->with('success', 'You have successfully created new Project');
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
        $checkadmin = User::find($id1);        
        $checkadmins = $checkadmin->hasRole('Admin');
        $users = User::role('Admin')->select('id')->get();
        $now = new \DateTime();
        $project = Project::find($id);
        if(!$project)
        {
            Alert::error('Error', 'Project not found')->showConfirmButton('Ok','#3085d6')->autoClose(15000);
            return redirect()->route('projects.index')->with('success', 'You have successfully updated Project');
        }
        
        $poc = User::find($project->poc);
        $project->pocname = $poc->name;
        $cco = User::find($project->cco);
        $project->cconame = $cco->name;

        $project_users = Project_user::where('project_id', $id)->select('user_id')->get();
       // $admin = 1;
      //  $users = User::whereNotIn('id', $project_users)->where('id', '<>', $admin)->get();
        $users = User::where('verified', 1)->whereNotIn('id', $project_users)->get();  //samar- to remove selected users.
        $selected_users = User::whereIn('id', $project_users)->get();

        //dd($selected_users, $users);

        
        
        if($id1 == $poc->id || $checkadmins)
        {
            $project->can_edit = 1;
            $project->can_view = 1;
            $project->can_delete = 1;
            $tasks = Task::where('project_id', $id)->paginate(15); 
        }
        elseif($id1 == $cco->id)
        {
            $project->can_edit = 0;
            $project->can_view = 1;
            $project->can_delete = 0;
            $tasks = Task::where('project_id', $id)->where('assignee', $id1)->paginate(15); 
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
                    /*$project->can_edit = 0;
                    $project->can_view = 0;
                    $project->can_delete = 0;*/
                    //return view('errors.401');
                    // Removed because a user can see can view project
                }
            }
            if(count($project_users) == 0)
                return view('errors.401');
            $tasks = Task::where('project_id', $id)->where('assignee', $id1)->paginate(15); 
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

            if($checkadmins)
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
            if($value->status == 3)
                $value->color = 4;
        }
        
        $files = Project_file::where('project_id', $id)->get();
        foreach ($files as $filekey => $file) 
        {
            //$date1 = new DateTime($file->created_at);
            $date1 = date('Y-m-d', strtotime("+4 months", strtotime($file->created_at)));
            //dd($date1);
            $date1 = new DateTime($date1);
            $d = date_diff($now, $date1);
            
            $file->check = $d->invert;
            $file->left = $d->days;
            /*$interval = $date1->diffInDays($now);
            $file->left = $interval->format('%a');*/

        }

        if(Project_form::where('project_id', $id)->exists())
        {
            $attestation = Project_form::where('project_id', $id)->first();
            $sections = Form_section::where('form_id', $attestation->id)->get();
            $attestation->status = true; 
        }
        else
        {
            $attestation = Attestation::find(3);
            $sections = Form_section::where('form_id', $attestation->id)->get();;
            $attestation->status = false;
        }

        $form_files = Form_file::where('project_id', $id)->get();
        
        $form_sign = Form_sign::where('form_id', $attestation->id)->get();
        foreach ($form_sign as $form_signkey => $sign_value) 
        {
            $sign_name = User::find($sign_value->user_id);
            $sign_value->name = $sign_name->name.' '.$sign_name->lastname;
        }
       // dd($selected_users);

        if (Auth::user()->hasPermissionTo('client view'))            
            return view('projects.show', compact('project', 'tasks', 'users', 'selected_users', 'files', 'attestation', 'form_files', 'form_sign', 'sections'));
        else
            return view('errors.401');
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
        $checkadmin = User::find($id1);        
        $checkadmins = $checkadmin->hasRole('Admin');
        $useradmin = User::role('Admin')->select('id')->get();        
        $users = User::where('verified', 1)->whereNotIn('id', $useradmin)->get();
        //$users = User::where('verified', 1)->where('id', '<>', 1)->get();
        $project = Project::find($id);
        if($id1 == $project->poc || $checkadmins)
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
        $this->validate($request, [
            'name'=> 'required|max:191', /*limit increased on client's request -samar*/                       
            'description'=> 'required|max:2048',
            'poc'=> 'numeric|min:1',
            'cco'=> 'numeric|min:1',
            'duedate'=> 'required|date_format:Y-m-d',            
            ],
            [
                'poc.min' => 'Please choose a user.',
                'cco.min' => 'Please choose a user.',
            ]
        );        
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

        $id1 = Auth::id();
        $checkadmin = User::find($id1);        
        $checkadmins = $checkadmin->hasRole('Admin');

        if($checkadmins)
        {}
        else            
            Mail::to('erg@ginisis.com')->send(new Project_editted($project));

        Alert::success('Success', 'You have successfully updated Project')->showConfirmButton('Ok','#3085d6')->autoClose(15000);
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
        //dd('delete has been hitted');
        $project = Project::find($id);
        $form_files = Form_file::where('project_id', $id);
        $task = Task::where('project_id', $id);
        $project_user = Project_user::where('project_id', '=', $id);
        $form_id = Form_file::where('project_id', $id)->select('form_id')->first();
        if($form_id)
        {
            $formid = $form_id->form_id;
            $sign = Form_sign::where('form_id', $formid);
            $initial = Form_initial::where('form_id', $formid);
            $sections = Form_section::where('form_id', $formid);
            $user_forms = User_form::where('form_id', $formid);    
            $sign->delete();
            $initial->delete();
            $sections->delete();
            $user_forms->delete();        
        }
        
        $form = Project_form::where('project_id', $id);
        $files = Project_file::where('project_id', $id);
        
        //dd($user_forms->get());
        $form_files->delete();
        $task->delete();
        $project_user->delete();
        $form->delete();
        $files->delete();
        
        //dd('wait');
        $project->delete();

        Alert::success('Success', 'You have successfully deleted Project')->showConfirmButton('Ok','#3085d6')->autoClose(15000);
        return redirect()->route('projects.index')->with('success', 'You have successfully deleted Project');
    }
}
