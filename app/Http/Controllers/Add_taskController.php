<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Project;
use App\Task;
use App\User;
use App\Task_template;
use App\Task_for_template;
use RealRashid\SweetAlert\Facades\Alert;
use Mail;
use App\Mail\Task_assigned;


class Add_taskController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        /*$project = $id;
        $template = Task_template::find(1);
        $tasks = Task_for_template::where('task_template_id', 1)->get();
        foreach ($tasks as $key => $value) {
            if($value->category == 1)
            {
                $value->category1 = 'Simple';
            }
            elseif($value->category == 2)
            {
                $value->category1 = 'Average';
            }
            elseif($value->category == 3)
            {
                $value->category1 = 'Difficult';
            }
            else
            {
                $value->category1 = 'no category';
            }
        }
        return view('add_task.edit', compact('project', 'tasks', 'template'));*/
    }
    public function add($projectId, $templateId)
    {
        //dd($projectId, $templateId);
        $project = $projectId;
        $template = Task_template::find($templateId);
        $tasks = Task_for_template::where('task_template_id', $templateId)->get();
        foreach ($tasks as $key => $value) {
            if($value->category == 1)
            {
                $value->category1 = 'Simple';
            }
            elseif($value->category == 2)
            {
                $value->category1 = 'Average';
            }
            elseif($value->category == 3)
            {
                $value->category1 = 'Difficult';
            }
            else
            {
                $value->category1 = 'no category';
            }
        }
        return view('add_task.edit', compact('project', 'tasks', 'template'));
    }
    public function pro($id)
    {
        $projectId = $id;
        $templates = Task_template::all();
        return view('add_task.index', compact('projectId', 'templates'));   
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
        $id1 = Auth::id();
        $template = Task_template::find($id);
        $project = Project::find($request->project);
        //dd($template, $project);
        $templates = Task_for_template::where('task_template_id', $id)->get();
        foreach ($templates as $templatekey => $value) 
        {
            $name = 'task'.$value->id;
            if($request->$name == 'true')
            {
                $task = new Task;
                $task->project_id = $project->id;
                $task->title = $value->title;
                $task->assignee = $project->poc;
                $task->duedate = $project->duedate;
                $task->category = $value->category;
                $task->estimated_time_to_complete = $value->estimated_time_to_complete;
                $task->status = 1;
                $task->note = $value->note;
                $task->responsible = $id1;
                $task->save();
            }
        }

        $user1 = User::findOrFail($project->poc);
        //Mail::to($user1['email'])->send(new Task_assigned($user1, $project));

        Alert::success('Success', 'You have successfully added task to Client')->showConfirmButton('Ok','#3085d6')->autoClose(15000);
        return redirect()->route('projects.show', $request->project)->with('success', 'You have successfully added task to Client');

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
