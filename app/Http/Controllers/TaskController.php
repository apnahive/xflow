<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Project_user;
use App\Task;
use App\User;
use App\Task_template;
use App\Task_for_template;
use Illuminate\Support\Facades\Auth;
use DateTime;

class TaskController extends Controller
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
        $now = new \DateTime();
        
        if($id1 == 1)
        {
            //$users = User::all();
            $tasks = Task::all();
            $tasks->admin = 1;
        }
        else
        {
            $tasks = Task::where('assignee', $id1)->get();
            $tasks->admin = 0;
        }

        if($projects = Project::where('poc', $id1)->exists())
        {
            $tasks->poc = 1;            
        }
        else
        {
            $tasks->poc = 0;
        }
        if($projects = Project::where('cco', $id1)->exists())
        {
            $tasks->cco = 1;            
        }
        else
        {
            $tasks->cco = 0;
        }



        foreach ($tasks as $key => $value) {
            $project = Project::find($value->project_id);

            $value->projectname = $project->name;
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

            if($project->poc == $id1)
                $value->poc = 1;
            if($project->cco == $id1)
                $value->cco = 1;

            if(Project_user::where('project_id', $project->id)->where('user_id', $id1)->exists())
                $value->user = 1;
            else
                $value->user = 0;

            //color coding of task
            $date1 = new DateTime($value->duedate);
            $d = date_diff($now, $date1);
            //dd($now, $date1, $d, $d->days);
            if($d->days > 3)
                $value->color = 3;
            if($d->days <= 3)
                $value->color = 2;
            if($d->invert)
                $value->color = 1;

            //dd($d->days > 3, $d);

            //dd($value, $project); 
        }
        $users = User::all();
        $task_templates = Task_template::all();
        //dd($tasks);

        // search functionality

        $managed = Task::select('responsible')->get();
        //dd($managed);
        return view('tasks.index', compact('tasks', 'task_templates', 'users'));
    }
    public function search(Request $request)
    {
        dd('search has been hit');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id1 = Auth::id();
        if($id1 == 1)
        {
            //$users = User::all();
            $projects = Project::all(); 
        }
        else
        {
            $projects = Project::where('poc', $id1)->orWhere('cco', $id1)->get();
        }
        //dd($projects);
        return view('tasks.create', compact('projects'));
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
            'project'=> 'numeric|min:1',
            'title'=> 'required|max:20',
            'duedate'=> 'required|date',
            'category'=> 'numeric|min:1',
            'estimated_time_to_complete'=> 'numeric|min:1',
            'note'=> 'required|max:191',
        ));
        $task = new Task;
        $task->project_id = $request->project;
        $task->title = $request->title;
        $task->duedate = $request->duedate;
        $task->category = $request->category;
        $task->estimated_time_to_complete = $request->estimated_time_to_complete;
        //$task->actual_time_to_complete = $request->actual_time_to_complete;
        $task->status = 1;
        //$task->date_completed = $request->date_completed;
        $task->note = $request->note;

        $id1 = Auth::id();
        if($id1 == 1)
        {
            $project = Project::find($request->project);
            $task->assignee = $project->poc;
            $task->responsible = $id1;
        }
        else
        {
            $task->assignee = $id1;
            $task->responsible = $id1;    
        }
        
        $task->save();
        return redirect()->route('tasks.index')->with('success', 'You have successfully created Task');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {        
        $task = Task::find($id);
        //$users = User::all();
        $project = Project::find($task->project_id);
        $task->projectname = $project->name;
        $assignee = User::find($task->assignee);
        $task->assigneename = $assignee->name;
        if($task->category == 1)
            $task->categorys = "simple";
        elseif($task->category == 2)
            $task->categorys = "Average";
        else
            $task->categorys = "Difficult";

        if($task->status == 1)
            $task->statuss = "Pending";
        elseif($task->status == 2)
            $task->statuss = "Initiated";
        else
            $task->statuss = "completed";

        $responsible = User::find($task->responsible);
        $task->responsibles = $responsible->name;

        //dd($task);


        return view('tasks.show', compact('task'));
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
        $task = Task::find($id);
        /*if($id1 == 1)
        {
            //$users = User::all();
            $task->admin = 1;
            $projects = Project::all(); 
        }
        else
        {
            $projects = Project::where('poc', $id1)->get();
            $task->admin = 0;
        }*/
        $projects = Project::all(); 

        if($id1 == 1)
        $task->admin = 1;
        else
        $task->admin = 0;

        $task_project = Project::find($task->project_id);
        if($task_project->poc == $id1)
        {            

            $task->poc = 1;
            $task->cco = 0; 
            $task->user = 0;           
        }
        elseif($task_project->cco == $id1)
        {
            
            $task->poc = 0;
            $task->cco = 1; 
            $task->user = 0;           
        }
        else
        {
            
            $task->poc = 0;
            $task->cco = 0;
            if(Project_user::where('project_id', $task_project->id)->where('user_id', $id1)->exists())
                $task->user = 1;
            else
                $task->user = 0;
        }
        //dd($task);
        $users = User::all();
        if($task->admin || $task->poc || $task->cco || $task->user)
            return view('tasks.edit', compact('projects', 'task', 'users'));
        else
            return view('errors.401');
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
            'project'=> 'numeric|min:1',
            'title'=> 'max:20',
            'duedate'=> 'date',
            'category'=> 'numeric|min:1',
            'estimated_time_to_complete'=> 'numeric|min:1',
            'actual_time_to_complete'=> 'numeric|min:1',
            'status'=> 'numeric|min:1',            
            'note'=> 'max:191',
        ));

        $id1 = Auth::id();

        $task = Task::find($id);
        if($request->project)
        $task->project_id = $request->project;
        if($request->title)
        $task->title = $request->title;
        if($request->duedate)
        $task->duedate = $request->duedate;
        if($request->category)
        $task->category = $request->category;
        if($request->estimated_time_to_complete)
        $task->estimated_time_to_complete = $request->estimated_time_to_complete;
        $task->actual_time_to_complete = $request->actual_time_to_complete;
        $task->status = $request->status;
        $task->date_completed = $request->date_completed;
        $task->note = $request->note;
        if($request->assignee)
        {
            $task->assignee = $request->assignee;
            if($request->assignee == $id1)
            {}
            else
            {
                $task->responsible = $id1;
            }
        }
        
        $task->save();
        return redirect()->route('tasks.index')->with('success', 'You have successfully updated Task');
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
