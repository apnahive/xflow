<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\State;
use App\City;
use App\Job;
use App\Profile;
use App\Interview_schedule;
use App\User;
use App\Job_shortlisted;
use RealRashid\SweetAlert\Facades\Alert;

class JobController extends Controller
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
        $state = State::all();
        $cities = City::paginate(10);
        //dd($cities);
        $id1 = Auth::id();
        $checkadmin = User::find($id1);        
        $checkadmins = $checkadmin->hasRole('Admin');
    
        if($checkadmins)        
            $jobs = Job::all();
        else
            $jobs = Job::where('user_id', $id1)->get();

        foreach ($jobs as $jobkey => $value) 
        {
            switch ($value->experience_level) 
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
            switch ($value->qualification) 
            {
                case '1':
                    $value->qualifications = 'Graduate';
                    break;
                case '1':
                    $value->qualifications = 'Post Graduate';
                    break;
                case '1':
                    $value->qualifications = 'PHD';
                    break;
                case '1':
                    $value->qualifications = 'No College Degree';
                    break;
                case '1':
                    $value->qualifications = 'Diploma';
                    break;
            }
        }
        //dd($jobs);
        if (Auth::user()->hasPermissionTo('can create job'))
            return view('jobs.index', compact('jobs'));
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
        $states = State::all();
        $cities = City::select('city')->distinct()->get();
        //dd($cities);
        if (Auth::user()->hasPermissionTo('can create job'))
            return view('jobs.create', compact('states', 'cities'));
        else
            return view('errors.401');
        
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
            'title'=> 'required|max:191', 
            'description'=> 'required|max:2048',
            'experience_level'=> 'numeric|min:1',
            'experience_years'=> 'numeric|min:1',
            'state'=> 'required|max:191', 
            'city'=> 'required|max:191', 
            'qualification'=> 'numeric|min:1',
            'certificate'=> 'numeric|min:1',
            'start_date'=> 'required|date',
            'skills'=> 'required|max:191', 
            'salary_offered'=> 'numeric|min:1',
            ],
            [
                'experience_level.min' => 'Please choose a Experience.',
                'experience_years.min' => 'Please choose a Years.',
                'qualification.min' => 'Please choose a qualification.',
                'certificate.min' => 'Please choose a certificate.',
            ]
        );

        $id1 = Auth::id();
        $job = new Job;
        $job->title = $request->title;
        $job->description = $request->description;
        $job->experience_level = $request->experience_level;
        $job->experience_years = $request->experience_years;
        $job->state = $request->state;
        $job->city = $request->city;
        $job->qualification = $request->qualification;
        $job->certificate = $request->certificate;
        $job->start_date = $request->start_date;
        $job->skills = $request->skills;
        $job->salary_offered = $request->salary_offered;
        $job->user_id = $id1;
        $job->save();

        $profile_exist = Profile::select('user_id')->get();
        foreach ($profile_exist as $key => $value) 
        {
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



        Alert::success('Success', 'You have successfully created Job')->showConfirmButton('Ok','#3085d6')->autoClose(15000);
        return redirect()->route('jobs.show', $job->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job = Job::find($id);
        //dd($job);
        $states = State::all();
        $cities = City::select('city')->distinct()->get();
        //dd($cities);
        /*$tags = $job->skills->toArray();
        $tags = implode(', ', $tags);
        dd('$tags');*/
        //$profile_exist = Profile::select('user_id')->get();
        //$shortlisted = User::permission('can apply job')->get();
        /*$tags = $job->skills;
        $tags = explode(', ', $tags);
        foreach ($tags as $cskillkey => $cskill) 
        {
            dd($cskill);
        }
        dd($tags);*/
        $shortlisted = Job_shortlisted::where('job_id', $id)->orderBy('points', 'DESC')->limit(3)->get();
        //User::whereIn('id', $profile_exist)->limit(3)->get();
        //dd($shortlisted);
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

        $interviews = Interview_schedule::where('job_id', $id)->select('job_id', 'candidate_id')->distinct()->get();
        //dd($interviews);
        foreach ($interviews as $key => $value) 
        {
            //dd($value->candidate_id);
            $user = User::find($value->candidate_id);

            $value->name = $user->name.' '.$user->lastname;
            $profile = Profile::where('user_id', $value->candidate_id)->first();
            //dd($value->candidate_id, $profile);
            switch ($profile->experience_level) 
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
            $value->skills = $profile->skills;
            $value->salary_expected = $profile->salary_expected;

        }

        $notes = Interview_schedule::where('job_id', $id)->where('scheduled', 1)->get();
        foreach ($notes as $key => $value) 
        {
            $user = User::find($value->candidate_id);
            $value->name = $user->name.' '.$user->lastname;
        }
        //dd($notes);



        if (Auth::user()->hasPermissionTo('can create job'))
            return view('jobs.show', compact('states', 'cities', 'job', 'shortlisted', 'interviews', 'notes'));
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
        $job = Job::find($id);
        //dd($job);
        $states = State::all();
        $cities = City::select('city')->distinct()->get();
        //dd($cities);
        if (Auth::user()->hasPermissionTo('can create job'))
            return view('jobs.edit', compact('states', 'cities', 'job'));
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
            'title'=> 'required|max:191', 
            'description'=> 'required|max:2048',
            'experience_level'=> 'numeric|min:1',
            'experience_years'=> 'numeric|min:1',
            'state'=> 'required|max:191', 
            'city'=> 'required|max:191', 
            'qualification'=> 'numeric|min:1',
            'certificate'=> 'numeric|min:1',
            'start_date'=> 'required|date',
            'skills'=> 'required|max:191', 
            'salary_offered'=> 'numeric|min:1',
            ],
            [
                'experience_level.min' => 'Please choose a Experience.',
                'experience_years.min' => 'Please choose a Years.',
                'qualification.min' => 'Please choose a qualification.',
                'certificate.min' => 'Please choose a certificate.',
            ]
        );

        //$id1 = Auth::id();
        $job = Job::find($id);
        $job->title = $request->title;
        $job->description = $request->description;
        $job->experience_level = $request->experience_level;
        $job->experience_years = $request->experience_years;
        $job->state = $request->state;
        $job->city = $request->city;
        $job->qualification = $request->qualification;
        $job->certificate = $request->certificate;
        $job->start_date = $request->start_date;
        $job->skills = $request->skills;
        $job->salary_offered = $request->salary_offered;
        //$job->user_id = $id1;
        $job->save();

        Alert::success('Success', 'You have successfully updated Job')->showConfirmButton('Ok','#3085d6')->autoClose(15000);
        return redirect()->route('jobs.index');
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
