<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Task;
use App\User;
use DateTime;
use RealRashid\SweetAlert\Facades\Alert;
use Mail;
use App\Mail\Task_initiated;
use App\Mail\Task_completed;

class Start_taskController extends Controller
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
    public function store(Request $request) //for task copy for regulated interval
    {
        //dd(request()->all());
        $this->validate($request, array(
            'start'=> 'required|date',
            'till'=> 'required|date',
            'interval'=> 'numeric|min:1',
        ));
        //$now = new \DateTime();
        //$now1 = new \DateTime();
        $task = Task::find($request->task);

        $now = $request->start;
        while ($now < $request->till) 
        {   
            $task_new = new Task;

            $task_new->project_id = $task->project_id;
            $task_new->title = $task->title;
            $task_new->duedate = $now;
            $task_new->category = $task->category;
            $task_new->estimated_time_to_complete = $task->estimated_time_to_complete;            
            $task_new->status = 1;            
            $task_new->note = $task->note;
            $task_new->assignee = $task->assignee;
            $task_new->responsible = $task->responsible;
            $task_new->copy = $task->id;
            $task_new->save();

            if($request->interval == 1)
                $now = date('Y-m-d', strtotime("+1 days", strtotime($now)));
            elseif($request->interval == 2)
                $now = date('Y-m-d', strtotime("+7 days", strtotime($now)));
            elseif($request->interval == 3)
                $now = date('Y-m-d', strtotime("+1 months", strtotime($now)));
            elseif($request->interval == 4)
                $now = date('Y-m-d', strtotime("+3 months", strtotime($now)));

        }
        Alert::success('Success', 'task has been Copied')->showConfirmButton('Ok','#3085d6')->autoClose(15000);
        return redirect()->back()->with('success','task has been Initiated');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //dd("task copy");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //dd("task Initiated");
        $task = Task::find($id);
        $task->status = 2;
        $task->save();

        $user1 = User::findOrFail($task->responsible);
        Mail::to($user1['email'])->send(new Task_initiated($task));
        Mail::to('erg@ginisis.com')->send(new Task_initiated($task));

        Alert::success('Success', 'task has been Initiated')->showConfirmButton('Ok','#3085d6')->autoClose(15000);
        return redirect()->back()->with('success','task has been Initiated');
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
        //dd("task complete");
        $this->validate($request, array(            
            'date_completed'=> 'date',
            'actual_time_to_complete'=> 'numeric|min:1',            
        ));
        $task = Task::find($id);
        
        
        $task->actual_time_to_complete = $request->actual_time_to_complete;
        $task->status = 3;
        $task->date_completed = $request->date_completed;
        
        
        $task->save();

        $user1 = User::findOrFail($task->responsible);
        Mail::to($user1['email'])->send(new Task_completed($task));
        Mail::to('erg@ginisis.com')->send(new Task_completed($task));

        Alert::success('Success', 'task has been completed')->showConfirmButton('Ok','#3085d6')->autoClose(15000);
        return redirect()->back()->with('success','task has been completed');
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
