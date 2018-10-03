<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Task;
use App\User;
use App\Project;
use DateTime;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function __construct()
    {
        $this->middleware(['auth','isVerified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id1 = Auth::id();
        $checkadmin = User::find($id1);        
        $checkadmins = $checkadmin->hasRole('Admin');
        //dd($users);
        //$roles = $user->getRoleNames();
        
        $now = new \DateTime();
        
        if($checkadmins)
            $tasks = Task::all();
        else
            $tasks = Task::where('assignee', $id1)->get();
        $tasks->red = 0;
        $tasks->yellow = 0;
        $tasks->green = 0;
        foreach ($tasks as $key => $value) 
        {
            $date1 = new DateTime($value->duedate);
            $d = date_diff($now, $date1);
            //dd($now, $date1, $d, $d->days);
            if($d->days > 3 && $d->invert == 0)
                $tasks->green++;
            if($d->days <= 3 && $d->invert == 0)
                $tasks->yellow++;
            if($d->invert)
                $tasks->red++;
        }

        $poc = Project::where('poc', $id1)->get();
        $poc->task = 0;
        $poc->project = count($poc);
        foreach ($poc as $pockey => $value) 
        {
            $poctask = Task::where('assignee', $id1)->where('project_id', $value->id)->get();
            $poc->task = $poc->task + count($poctask);
        }

        $cco = Project::where('cco', $id1)->get();
        $cco->task = 0;
        $cco->project = count($poc);
        foreach ($cco as $ccokey => $value1) 
        {
            $ccotask = Task::where('assignee', $id1)->where('project_id', $value1->id)->get();
            $cco->task = $cco->task + count($ccotask);
        }

        $other_task = count($tasks) - ($poc->task + $cco->task);
        //dd($other_task);
        $tasks->remaining = $other_task;
        //dd($cco);
        return view('home', compact('tasks', 'poc', 'cco'));
    }
}
