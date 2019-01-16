<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interview_schedule;
use App\State;
use App\City;
use App\Job;
use App\User;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

use Mail;
use App\Mail\Candidate_invite;
use App\Mail\Candidate_interview_confirmed;

class Interview_scheduleController extends Controller
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
        $interviews = Interview_schedule::select('job_id')->distinct()->get();
        foreach ($interviews as $key => $value) 
        {
            $job = Job::find($value->job_id);
            $value->job = $job->title;
            switch ($job->experience_level) 
            {
                case '1':
                    $value->experience = 'Entry Level';
                    break;
                case '2':
                    $value->experience = 'Inermediate Level';
                    break;
                case '3':
                    $value->experience = 'Expert Level';
                    break;
            }
            $value->skills = $job->skills;
            $value->salary_offered = $job->salary_offered;

        }
        if (Auth::user()->hasPermissionTo('can apply job'))
            return view('interviewed.index', compact('interviews'));
        else
            return view('errors.401');
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
        $id1 = Auth::id();
        $job = Job::find($id);
        //dd($job);
        $states = State::all();

        $cities = City::select('city')->distinct()->get();

        $interviews = Interview_schedule::where('job_id', $id)->where('candidate_id', $id1)->get();

        //dd($interview);

        if (Auth::user()->hasPermissionTo('can apply job'))
            return view('interviewed.show', compact('job', 'states', 'cities', 'interviews'));
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
        $selected = Interview_schedule::find($id);
        $job_id = $selected->job_id;
        $candidate_id = $selected->candidate_id;

        $interviews = Interview_schedule::where('job_id', $job_id)->where('candidate_id', $candidate_id)->get();

        foreach ($interviews as $key => $value) 
        {
            if($value->id == $id) 
            {
                $value->scheduled = 1;
                $value->save();
            }
            else
            {
                $value->scheduled = 0;
                $value->active = 0;
                $value->save();
            }

        }

        $job = Job::find($job_id);
        $user1 = User::find($candidate_id);
        $client = User::find($job->user_id);
        $job->client_name = $client->name.' '.$client->lastname;

        Mail::to($client['email'])->send(new Candidate_interview_confirmed($job, $user1));


        Alert::success('Success', 'You have successfully scheduled Job interview')->showConfirmButton('Ok','#3085d6')->autoClose(15000);
        return redirect()->route('home');
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
            'date1'=> 'required|date',
            'date2'=> 'required|date',
            'date3'=> 'required|date',
            'time1' => 'date_format:H:i',
            'time2' => 'date_format:H:i',
            'time3' => 'date_format:H:i',
            'state'=> 'required|max:191', 
            'city'=> 'required|max:191', 
            'address'=> 'required|max:2048',
        ));
        $interview1 = new Interview_schedule;
        $interview2 = new Interview_schedule;
        $interview3 = new Interview_schedule;

        $interview1->job_id = $request->job_id;
        $interview1->candidate_id = $id; 
        $interview1->date = $request->date1;
        $interview1->time = $request->time1;
        $interview1->state = $request->state;
        $interview1->city = $request->city;
        $interview1->address = $request->address;
        $interview1->active = 1;

        $interview2->job_id = $request->job_id;
        $interview2->candidate_id = $id;
        $interview2->date = $request->date2;
        $interview2->time = $request->time2;
        $interview2->state = $request->state;
        $interview2->city = $request->city;
        $interview2->address = $request->address;
        $interview2->active = 1;

        $interview3->job_id = $request->job_id;
        $interview3->candidate_id = $id;
        $interview3->date = $request->date3;
        $interview3->time = $request->time3;
        $interview3->state = $request->state;
        $interview3->city = $request->city;
        $interview3->address = $request->address;
        $interview3->active = 1;

        $interview1->save();
        $interview2->save();
        $interview3->save();

        $job = Job::find($request->job_id);
        $user1 = User::find($id);

        Mail::to($user1['email'])->send(new Candidate_invite($job, $user1));
        
        Alert::success('Success', 'You have successfully invited for the interview. When candidate accept invite, we will inform you.')->showConfirmButton('Ok','#3085d6')->autoClose(15000);
        return redirect()->route('jobs.show', $request->job_id);
        

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
