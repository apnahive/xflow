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
use RealRashid\SweetAlert\Facades\Alert;
use Mail;
use App\Mail\Task_assigned;

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
        $checkadmin = User::find($id1);        
        $checkadmins = $checkadmin->hasRole('Admin');
        $now = new \DateTime();
        
        if($checkadmins)
        {
            //$users = User::all();
            $tasks = Task::paginate(10);
            /*$tasks = Task::with('projects')->get()
               ->sortBy(function($project) { 
                   return $project->tasks->title;
              });
            dd($tasks);*/
            $managed1 = Task::select('responsible')->get();
            $assigned1 = Task::select('assignee')->get();
            $tasks->admin = 1;
        }
        else
        {
            $tasks = Task::where('assignee', $id1)->paginate(15);
            $managed1 = Task::where('assignee', $id1)->select('responsible')->get();
            $assigned1 = Task::where('assignee', $id1)->select('assignee')->get();
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
            if($value->status == 3)
                $value->color = 4;

            //dd($d->days > 3, $d);

            //dd($value, $project); 
        }
        //$users = User::where('verified', 1)->where('id', '<>', 1)->get();
        $useradmin = User::role('Admin')->select('id')->get();        
        $users = User::where('verified', 1)->whereNotIn('id', $useradmin)->get();
        $task_templates = Task_template::all();
        //dd($tasks);

        // search functionality

        
        $managedby = User::whereIn('id', $managed1)->get();
        
        $assignedto = User::whereIn('id', $assigned1)->get();
        //dd($assignedto);
        if (Auth::user()->hasPermissionTo('task view'))
            return view('tasks.index', compact('tasks', 'task_templates', 'users', 'managedby', 'assignedto'));
        else
            return view('errors.401');
        //return view('tasks.index', compact('tasks', 'task_templates', 'users', 'managedby', 'assignedto'));
    }
    public function sort($feild, $type)
    {
        //dd($feild, $type);
        $id1 = Auth::id();
        $checkadmin = User::find($id1);        
        $checkadmins = $checkadmin->hasRole('Admin');
        $now = new \DateTime();
        
        if($checkadmins)
        {
            //$users = User::all();
            $tasks = Task::join('projects', 'tasks.project_id', '=', 'projects.id')->select('tasks.id', 'tasks.title', 'tasks.project_id', 'tasks.duedate', 'tasks.status', 'tasks.responsible', 'tasks.assignee', 'projects.name')->orderBy($feild, $type)->paginate(10); //for sorting

            
            //dd($tasks);
            $managed1 = Task::select('responsible')->get();
            $assigned1 = Task::select('assignee')->get();
            $tasks->admin = 1;
        }
        else
        {
            $tasks = Task::where('assignee', $id1)->orderBy($feild, $type)->paginate(15); //for sorting
            $managed1 = Task::where('assignee', $id1)->select('responsible')->get();
            $assigned1 = Task::where('assignee', $id1)->select('assignee')->get();
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
            if($value->status == 3)
                $value->color = 4;

            //dd($d->days > 3, $d);

            //dd($value, $project); 
        }
        //$users = User::where('verified', 1)->where('id', '<>', 1)->get();
        $useradmin = User::role('Admin')->select('id')->get();        
        $users = User::where('verified', 1)->whereNotIn('id', $useradmin)->get();
        $task_templates = Task_template::all();
        //dd($tasks);

        // search functionality

        
        $managedby = User::whereIn('id', $managed1)->get();
        
        $assignedto = User::whereIn('id', $assigned1)->get();
        //dd($assignedto);
        if (Auth::user()->hasPermissionTo('task view'))
            return view('tasks.index', compact('tasks', 'task_templates', 'users', 'managedby', 'assignedto'));
        else
            return view('errors.401');
        //return view('tasks.index', compact('tasks', 'task_templates', 'users', 'managedby', 'assignedto'));
    }
    public function search(Request $request)
    {
        //dd(request()->all());
        $id1 = Auth::id();
        $checkadmin = User::find($id1);        
        $checkadmins = $checkadmin->hasRole('Admin');
        $now = new \DateTime();

        
        if($checkadmins)
        {
            //$users = User::all();
            //$tasks = Task::all();
            if($request->task == null && $request->project == null && $request->managed == 0 && $request->assigned == 0 && $request->status == 0)
            {
                return redirect()->route('tasks.index');
            }
            else
            {
                $search = $request;
                if($request->assigned <> 0)
                {
                    $search->assigned = $request->assigned;
                    $search->status = null;
                    $search->managed = null;
                    $search->project = null;
                    $search->task = null;
                    $tasks = Task::where('assignee', $request->assigned)->get();
                }
                if($request->status <> 0)
                {
                    $search->assigned = null;
                    $search->status = $request->status;
                    $search->managed = null;
                    $search->project = null;
                    $search->task = null;
                    $tasks = Task::where('status', $request->status)->get();
                }
                if($request->managed <> 0)
                {
                    $search->assigned = null;
                    $search->status = null;
                    $search->managed = $request->managed;
                    $search->project = null;
                    $search->task = null;
                    $tasks = Task::where('responsible', $request->managed)->get();
                }
                if($request->project)
                {
                    $search->assigned = null;
                    $search->status = null;
                    $search->managed = null;
                    $search->project = $request->project;
                    $search->task = null;
                    $searchproject = Project::where('name', 'like', '%'.$request->project.'%')->select('id')->get();
                    $tasks = Task::whereIn('project_id', $searchproject)->get();
                    //dd($tasks);
                }
                if($request->task)
                {
                    $search->assigned = null;
                    $search->status = null;
                    $search->managed = null;
                    $search->project = null;
                    $search->task = $request->task;
                    $tasks = Task::where('title', 'like', '%'.$request->task.'%')->get();
                }
            }
            //dd($tasks);
            $managed1 = Task::select('responsible')->get();
            $assigned1 = Task::select('assignee')->get();
            $tasks->admin = 1;
        }
        else
        {
            //$tasks = Task::where('assignee', $id1)->get();
            if($request->task == null && $request->project == null && $request->managed == 0 && $request->assigned == 0)
            {
                return redirect()->route('tasks.index');
            }
            else
            {
                if($request->assigned <> 0)
                    $tasks = Task::where('assignee', $id1)->where('assignee', $request->assigned)->get();
                if($request->managed <> 0)
                    $tasks = Task::where('assignee', $id1)->where('responsible', $request->managed)->get();
                if($request->project)
                {
                    $searchproject = Project::where('name', 'like', '%'.$request->project.'%')->select('id')->get();
                    $tasks = Task::where('assignee', $id1)->whereIn('project_id', $searchproject)->get();
                    //dd($tasks);
                }
                if($request->task)
                    $tasks = Task::where('assignee', $id1)->where('title', 'like', '%'.$request->task.'%')->get();
            }
            $managed1 = Task::where('assignee', $id1)->select('responsible')->get();
            $assigned1 = Task::where('assignee', $id1)->select('assignee')->get();
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
            if($value->status == 3)
                $value->color = 4;
            //dd($d->days > 3, $d);

            //dd($value, $project); 
        }
        //$users = User::where('verified', 1)->where('id', '<>', 1)->get();
        $useradmin = User::role('Admin')->select('id')->get();        
        $users = User::where('verified', 1)->whereNotIn('id', $useradmin)->get();
        $task_templates = Task_template::all();
        //dd($tasks);

        // search functionality

        
        $managedby = User::whereIn('id', $managed1)->get();
        
        $assignedto = User::whereIn('id', $assigned1)->get();
        //dd($search->status);
        if (Auth::user()->hasPermissionTo('task view'))
            return view('tasks.search', compact('tasks', 'task_templates', 'users', 'managedby', 'assignedto', 'search'));
        else
            return view('errors.401');
        //return view('tasks.search', compact('tasks', 'task_templates', 'users', 'managedby', 'assignedto', 'search'));
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
        if($checkadmins)
        {
            //$users = User::all();
            $projects = Project::all(); 
        }
        else
        {
            $projects = Project::where('poc', $id1)->orWhere('cco', $id1)->get();
        }
        //dd($projects);
        if (Auth::user()->hasPermissionTo('task create'))
            return view('tasks.create', compact('projects'));
        else
            return view('errors.401');
        //return view('tasks.create', compact('projects'));
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
            'project'=> 'numeric|min:1',
            'title'=> 'required|max:50', /*limit increased on client's request -samar*/
            'duedate'=> 'required|date',
            'category'=> 'numeric|min:1',
            'estimated_time_to_complete'=> 'numeric|min:1',
            'note'=> 'required|max:2048',
            ],
            [
                'project.min' => 'Please choose a Project.',
                'category.min' => 'Please choose a Category.',
            ]
        );
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
        $checkadmin = User::find($id1);        
        $checkadmins = $checkadmin->hasRole('Admin');
        if($checkadmins)
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

        $user1 = User::findOrFail($task->assignee);
        //Mail::to($user1['email'])->send(new Task_assigned($user1, $project));

        Alert::success('Success', 'You have successfully created Task')->showConfirmButton('Ok','#3085d6')->autoClose(15000);
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
        $now = new \DateTime();       
        $task = Task::find($id);
        if(!$task)
        {
            Alert::error('Error', 'Task not found')->showConfirmButton('Ok','#3085d6')->autoClose(15000);
            return redirect()->route('tasks.index');
        }
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
        //for access
        $id1 = Auth::id();
        $checkadmin = User::find($id1);        
        $checkadmins = $checkadmin->hasRole('Admin');
        if($checkadmins)
            $task->allow = 1;
        elseif($project->poc == $id1)
            $task->allow = 1;
        else
            $task->allow = 0;
        //dd($task);
        if (Auth::user()->hasPermissionTo('task view'))
            return view('tasks.show', compact('task', 'now'));
        else
            return view('errors.401');
        //return view('tasks.show', compact('task', 'now'));
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

        if($checkadmins)
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
        //$users = User::where('verified', 1)->where('id', '<>', 1)->get();
        $useradmin = User::role('Admin')->select('id')->get();        
        $users = User::where('verified', 1)->whereNotIn('id', $useradmin)->get();
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
        $this->validate($request, [
            'project'=> 'numeric|min:1',
            'title'=> 'max:50', /*limit increased on client's request -samar*/
            'duedate'=> 'date',
            'category'=> 'numeric|min:1',
            'estimated_time_to_complete'=> 'numeric|min:1',
            'actual_time_to_complete'=> 'numeric|nullable|min:1',
            'status'=> 'numeric|min:1',
            'assignee'=> 'numeric|min:1',
            'note'=> 'max:2048',
            ],
            [
                'project.min' => 'Please choose a Project.',
                'category.min' => 'Please choose a Category.',
                'status.min' => 'Please choose a Status.',
                'assignee.min' => 'Please choose a Assignee.',
            ]
        );

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
        Alert::success('Success', 'You have successfully updated Task')->showConfirmButton('Ok','#3085d6')->autoClose(15000);
        //return redirect()->back()->with('success', 'You have successfully updated Task');
       // return redirect()->route('tasks.index')->with('success', 'You have successfully updated Task');
        return redirect()->route('projects.show', $request->project)->withInput(['tab'=>'custom-nav-task']);
    }

    /**
     * Remove the specified resource from storage.
     * href="{{ route('projects.show', $project->id) }}"
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd('delete has been hitted');
        $task = Task::find($id);
        $task->delete();
        Alert::success('Success', 'You have successfully deleted Task')->showConfirmButton('Ok','#3085d6')->autoClose(15000);
        return redirect()->route('tasks.index')->with('success', 'You have successfully deleted Site');
    }

    public function deleteCopies(Request $request)
    {
        //dd('delete has been hitted');
        //dd(request()->all());
        //dd(request()->origintask);
        $id3 = $request->origintask;
        $tasks = Task::where('copy', $id3)->get();
        foreach ($tasks as $task) {
        $task->delete();    
         //dd($task);   
        }
        //dd($task);
        $task->delete();
        Alert::success('Success', 'You have successfully deleted all copied tasks')->showConfirmButton('Ok','#3085d6')->autoClose(15000);
        return redirect()->route('tasks.index')->with('success', 'You have successfully deleted Site');
    }
}
