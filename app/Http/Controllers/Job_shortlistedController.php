<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\State;
use App\City;
use App\Job;
use App\Profile;
use App\User;
use App\Job_shortlisted;
use RealRashid\SweetAlert\Facades\Alert;

class Job_shortlistedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    public function shortlist($id)
    {
        $job = Job::find($id);
        
        $states = State::all();
        $cities = City::select('city')->distinct()->get();

        //shortlisted algo code
        $profile_exist = Profile::select('user_id')->get();
        foreach ($profile_exist as $key => $value) 
        {
            if(Job_shortlisted::where('job_id', $job->id)->where('user_id', $value->user_id)->exists())
                $shortlisted = Job_shortlisted::where('job_id', $job->id)->where('user_id', $value->user_id)->first();
            else
                $shortlisted = new Job_shortlisted;
            $shortlisted->job_id = $job->id;
            $shortlisted->user_id = $value->user_id;
            //select profile to give points
            $profile = Profile::where('user_id', $value->user_id)->first();
            $points = 0;
            //location
            if($job->state == $profile->state1 && $job->city == $profile->city1)
                $points = $points + 1;
            elseif($job->state == $profile->state2 && $job->city == $profile->city2)
                $points = $points + 1;
            elseif($job->state == $profile->state3 && $job->city == $profile->city3)
                $points = $points + 1;
            elseif($job->state == $profile->state4 && $job->city == $profile->city4)
                $points = $points + 1;
            else
            {}
            //skills
            $cskills = explode(', ', $profile->skills);
            $jskills = explode(', ', $job->skills);
            foreach ($cskills as $cskillkey => $cskill) 
            {
                foreach ($jskills as $jskillkey => $jskill) 
                {
                    if($jskill == $cskill)
                        $points = $points + 1;
                }
            }
            //
            if($job->certificate == $profile->certificate)
                $points = $points + 1;

            if($job->qualification == $profile->qualification)
                $points = $points + 1;

            $experience = $profile->experience_years - 1;
            $points = $points + $experience;

            //points calculated
            $shortlisted->points = $points;
            $shortlisted->save();
        }
        return redirect()->route('shortlisted.show', $id);        
    }

    public function show($id)
    {
        $job = Job::find($id);
        
        $states = State::all();
        $cities = City::select('city')->distinct()->get();
        


        $shortlisted = Job_shortlisted::where('job_id', $id)->orderBy('points', 'DESC')->limit(3)->get();
        
        foreach ($shortlisted as $key => $value) 
        {
            $profile = Profile::where('user_id', $value->user_id)->first();
            
            $usershortlisted = User::where('id', $value->user_id)->first();
            //dd($usershortlisted);
            $value->name = $usershortlisted->name.' '.$usershortlisted->lastname;
            $value->title = $profile->title;
            $value->skills = $profile->skills;
            $value->qualification = $profile->qualification;
        }
        //dd($shortlisted);

        



        if (Auth::user()->hasPermissionTo('can create job'))
            return view('shortlisted.show', compact('states', 'cities', 'job', 'shortlisted'));
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
