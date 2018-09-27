<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Project;
use App\Task;
use App\User;
use RealRashid\SweetAlert\Facades\Alert;
use Mail;
use App\Mail\Task_to_cco;
use App\Mail\Task_assigned;


class Assign_taskController extends Controller
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
        //dd(request()->all());
        $task = Task::find($request->task_id);
        $task->assignee = $request->assignee;
        $task->save();

        $user1 = User::findOrFail($request->assignee);
        $project = Project::find($task->project_id);
        $task->projectname = $project->name;
        Mail::to($user1['email'])->send(new Task_assigned($user1, $task));

        Alert::success('Success', 'You have assigned task to user')->showConfirmButton('Ok','#3085d6')->autoClose(15000);
        return redirect()->back()->with('success','You have assigned task to user');
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
        //dd($id);
        $id1 = Auth::id();
        $project = Project::find($id);
        if($project->poc == $id1)
        {
            $tasks = Task::where('assignee', $id1)->where('project_id', $project->id)->get();
            $cco_tasks = Task::where('assignee', $project->cco)->get();
            return view('assign_tasks.edit', compact('project', 'tasks', 'cco_tasks'));
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
        $project = Project::find($id);
        $tasks = $request->assigned;
        $poc_tasks = $request->pocs;
        if(count($tasks))
        {
            foreach ($tasks as $taskkey => $value) 
            {
                //dd($value);
                $task = Task::find($value);
                $task->assignee = $project->cco;
                $task->save();
            }
        }
        if(count($poc_tasks))
        {
            foreach ($poc_tasks as $poc_taskkey => $poc_task) 
            {
                //dd($value);
                $task1 = Task::find($poc_task);
                $task1->assignee = $project->poc;
                $task1->save();
            }
        }

        $user1 = User::findOrFail($project->cco);
        Mail::to($user1['email'])->send(new Task_to_cco($user1, $project));

        Alert::success('Success', 'You have successfully assigned task to CCO')->showConfirmButton('Ok','#3085d6')->autoClose(15000);
        return redirect()->route('assign_tasks.edit', $id)->with('success', 'You have successfully assigned task to CCO');
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
