<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Task;
use App\User;
use App\Project;
use App\Profile;
use App\Job;
use App\Interview_schedule;
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
        $tasks->lightgreen = 0;
        foreach ($tasks as $key => $value) 
        {
            $date1 = new DateTime($value->duedate);
            $d = date_diff($now, $date1);
            //dd($now, $date1, $d, $d->days);
            if($d->days > 90 && $d->invert == 0) //for the dashboard
                $tasks->green++;
            elseif($d->days <= 30 && $d->days > 7 && $d->invert == 0) //for the dashboard
                $tasks->lightgreen++;
            elseif($d->days <= 7 && $d->invert == 0)
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
        //dd($tasks);

        //selecting skills


        $profiles = Profile::select('skills')->get();
        $skills = '';
        
        $toEnd = count($profiles);
        foreach ($profiles as $key => $value) 
        {
            if (0 === --$toEnd) 
            {
                $skills = $skills.$value->skills;
            }
            else
            {
                $skills = $skills.$value->skills.', ';
            }
        }
        
        //$skills = implode(',',array_unique(explode(', ', $skills)));
        $skills = explode(', ', $skills);
        $skills = array_unique($skills);
        //dd($skills);
        //$skills = (object) $skills;
        
        //$pie = new \stdClass();

        //$object = new stdClass();

        /*foreach ($skills as $key => $value)
        {
            $skills1->$key = $value;
        }*/

        
        //dd($skills1);
        foreach ($skills as $key => $value) 
        {
            //dd($key, $value);
            /*$skillcount = null;
            $skills1 = null;*/
            $skillcount = Job::where('skills', 'like', '%'.$value.'%')->get();
            /*$skills1 = new \stdClass();
            $skills1->skill = $value;
            $skills1->skillcount = count($skillcount);*/
            //dd($skills1);
            $pie[$value] = count($skillcount);//$skills1;
            //dd($value->skillcount);
            
       }

       $interviews = Interview_schedule::where('scheduled', 1)->get();
       $job_id = Interview_schedule::where('scheduled', 1)->select('job_id')->distinct()->get();
       $jobs = Job::whereIn('id', $job_id)->get();

        $interviews->red = 0;
        $interviews->yellow = 0;
        $interviews->green = 0;
        $interviews->lightgreen = 0;
       foreach ($interviews as $key => $value) 
       {        
            $date2 = new DateTime($value->date);
            $d1 = date_diff($now, $date2);
            //dd($now, $date1, $d, $d->days);
            if($d1->days > 7 && $d1->invert == 0) //for the dashboard
                $interviews->green++;
            elseif($d1->days <= 7 && $d1->days > 3 && $d1->invert == 0) //for the dashboard
                $interviews->lightgreen++;
            elseif($d1->days <= 3 && $d1->invert == 0)
                $interviews->yellow++;
            if($d1->invert)
                $interviews->red++;
       }

        $jobs->red = 0;
        $jobs->yellow = 0;
        $jobs->green = 0;
        $jobs->lightgreen = 0;
       foreach ($jobs as $key => $value) 
       {        
            $date3 = new DateTime($value->start_date);
            $d2 = date_diff($now, $date3);
            //dd($now, $date1, $d, $d->days);
            if($d2->days > 7 && $d2->invert == 0) //for the dashboard
                $jobs->green++;
            elseif($d2->days <= 7 && $d2->days > 3 && $d2->invert == 0) //for the dashboard
                $jobs->lightgreen++;
            elseif($d2->days <= 3 && $d2->invert == 0)
                $jobs->yellow++;
            if($d1->invert)
                $jobs->red++;
       }


       //My tasks
       $mytasks = Task::where('status', 1)->orderBy('duedate', 'ASC')->take(10)->get();
       //$mytasks = Task::where('assignee', $id1)->where('status', 1)->orderBy('duedate', 'ASC')->take(10)->get();

       foreach ($mytasks as $key => $value) {
           $date4 = new DateTime($value->duedate);
            $d4 = date_diff($now, $date4);
            //dd($now, $date1, $d, $d->days);
            if($d4->days > 3)
                $value->color = 3;
            if($d4->days <= 3)
                $value->color = 2;
            if($d4->invert)
                $value->color = 1;
            if($value->status == 3)
                $value->color = 4;
       }
       $myjobs = Job::where('user_id', $id1)->get();
       $myinterviews = Interview_schedule::where('scheduled', 1)->where('candidate_id', $id1)->get();
       foreach ($myinterviews as $key => $value) 
       {
           $user = User::find($value->candidate_id);

            $value->name = $user->name.' '.$user->lastname;
       }

       
       //$mytasks = Task::where('assignee', $id1)->where('status', 1)->take(10)->get();
       //dd($mytasks);

        //dd($interviews, $job);
        return view('home', compact('tasks', 'poc', 'cco', 'pie', 'interviews', 'jobs', 'mytasks', 'myjobs', 'myinterviews')); 
    }
}
