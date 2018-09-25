<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
use App\Task;
use App\User;
use App\Project;
use App\Project_user;
use DateTime;
use Illuminate\Support\Facades\Auth;

class CalenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $events = [];
        $id1 = Auth::id();
        if($id1 == 1)
            $tasks = Task::select('duedate')->distinct()->get();
        else
        {
            //$projects = Project::where('poc', $id1)
            $projects = Project::where('poc', $id1)->orWhere('cco', $id1)->select('id')->get();
            $tasks = Task::where('assignee', $id1)->orWhere('project_id', $projects)->select('duedate')->distinct()->get(); 
            //$tasks = Task::select('duedate')->distinct()->get();
        }

        

        foreach ($tasks as $taskkey => $task) 
        {
            if($id1 == 1)
            {
                $taskcount = Task::where('duedate', $task->duedate)->whereIn('status', [1,2])->get();
                if(!$taskcount)
                    $taskcount[0]->time = floor($taskcount[0]->estimated_time_to_complete/60);
                //dd($taskcount);
            }
            else
            {                
                $projects = Project::where('poc', $id1)->orWhere('cco', $id1)->select('id')->get();
                $taskcount = Task::where('duedate', '2018-09-13')->where('assignee', $id1)->orWhere('project_id', $projects)->whereIn('status', [1,2])->get();
            }
            
            $count = count($taskcount);
            //dd($taskcount);
            if($count == 1)
            {
                $taskcount[0]->time = floor($taskcount[0]->estimated_time_to_complete/60);
                //dd($taskcount[0]->estimated_time_to_complete);
                $events[] = \Calendar::event(
                    $count.'Tasks - '.$taskcount[0]->time.' Hrs',
                    true,
                    new \DateTime($task->duedate),
                    new \DateTime($task->duedate),
                    1,            
                     [
                         'color' => '#59bd60',
                         'url' => route('calender.show', $task->duedate),
                     ]
                );    
            }
            elseif($count == 0)
            {
                $events[] = \Calendar::event(
                    'Task completed',
                    true,
                    new \DateTime($task->duedate),
                    new \DateTime($task->duedate),
                    1,            
                     [
                         'color' => '#59bd60',
                         'url' => route('calender.show', $task->duedate),
                     ]
                );    
            }
            else
            {
                $time = 0;
                foreach ($taskcount as $countkey => $value) 
                {
                    $time = $time + $value->estimated_time_to_complete;    
                } 
                $taskcount->time = floor($time/60);
                //dd($taskcount->time);

                $events[] = \Calendar::event(
                    $count.'Tasks - '.$taskcount->time.' Hrs',
                    true,
                    new \DateTime($task->duedate),
                    new \DateTime($task->duedate),
                    1,            
                     [
                         'color' => '#59bd60',
                         'url' => route('calender.show', $task->duedate),
                     ]
                );    

            }

            
        }
        //dd($tasks);
        

       /* $events[] = \Calendar::event(
            "Valentine's Day", //event title
            true, //full day event?
            new \DateTime('2018-09-14'), //start time (you can also use Carbon instead of DateTime)
            new \DateTime('2018-09-14'), //end time (you can also use Carbon instead of DateTime)
            'stringEventId' //optionally, you can specify an event ID
        );*/
        
        $calendar = Calendar::addEvents($events);
        //dd($calendar);
        return view('calender.index', compact('calendar'));
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
        //dd('Date is pressed on calender');
        $id1 = Auth::id();
        $now = new \DateTime();
        
        if($id1 == 1)
        {
            //$users = User::all();
            $tasks = Task::where('duedate', $id)->get();
            //dd($tasks);
            $managed1 = Task::where('duedate', $id)->select('responsible')->get();
            $assigned1 = Task::where('duedate', $id)->select('assignee')->get();
            $tasks->admin = 1;
        }
        else
        {
            $tasks = Task::where('duedate', $id)->where('assignee', $id1)->get();
            $managed1 = Task::where('duedate', $id)->where('assignee', $id1)->select('responsible')->get();
            $assigned1 = Task::where('duedate', $id)->where('assignee', $id1)->select('assignee')->get();
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
        $users = User::where('verified', 1)->where('id', '<>', 1)->get();
        //$task_templates = Task_template::all();
        //dd($tasks);

        // search functionality

        
        $managedby = User::whereIn('id', $managed1)->get();
        
        $assignedto = User::whereIn('id', $assigned1)->get();
        //dd($assignedto);
        return view('calender.show', compact('tasks', 'users', 'managedby', 'assignedto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
