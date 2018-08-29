<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Task;
use App\Task_template;
use App\Task_for_template;
use Illuminate\Support\Facades\Auth;

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
        $tasks = Task::all();
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
        }

        $task_templates = Task_template::all();
        //dd($projects);
        return view('tasks.index', compact('tasks', 'task_templates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = Project::all();
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
            'estimated_time_to_complete'=> 'required|date_format:H:i',
            'actual_time_to_complete'=> 'required|date_format:H:i',
            'status'=> 'numeric|min:1',
            'date_completed'=> 'required|date',
            'note'=> 'required|max:191',
        ));
        $task = new Task;
        $task->project_id = $request->project;
        $task->title = $request->title;
        $task->duedate = $request->duedate;
        $task->category = $request->category;
        $task->estimated_time_to_complete = $request->estimated_time_to_complete;
        $task->actual_time_to_complete = $request->actual_time_to_complete;
        $task->status = $request->status;
        $task->date_completed = $request->date_completed;
        $task->note = $request->note;
        $id1 = Auth::id();
        $task->assignee = $id1;
        
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $projects = Project::all();
        $task = Task::find($id);
        return view('tasks.edit', compact('projects', 'task'));
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
        $this->validate($request, array(
            'project'=> 'numeric|min:1',
            'title'=> 'required|max:20',
            'duedate'=> 'required|date',
            'category'=> 'numeric|min:1',
            'estimated_time_to_complete'=> 'required|date_format:H:i',
            'actual_time_to_complete'=> 'required|date_format:H:i',
            'status'=> 'numeric|min:1',
            'date_completed'=> 'required|date',
            'note'=> 'required|max:191',
        ));
        $task = Task::find($id);
        $task->project_id = $request->project;
        $task->title = $request->title;
        $task->duedate = $request->duedate;
        $task->category = $request->category;
        $task->estimated_time_to_complete = $request->estimated_time_to_complete;
        $task->actual_time_to_complete = $request->actual_time_to_complete;
        $task->status = $request->status;
        $task->date_completed = $request->date_completed;
        $task->note = $request->note;
        $id1 = Auth::id();
        $task->assignee = $id1;
        
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
