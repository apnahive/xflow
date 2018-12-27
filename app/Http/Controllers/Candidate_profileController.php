<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\State;
use App\City;
use App\Profile;
use RealRashid\SweetAlert\Facades\Alert;

class Candidate_profileController extends Controller
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
        $states = State::all();
        $cities = City::select('city')->distinct()->get();
        //dd($cities);
        if (Auth::user()->hasPermissionTo('can apply job'))
            return view('candidates.create', compact('states', 'cities'));
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
            'employer'=> 'required|max:191',            
            'experience_level'=> 'numeric|min:1',
            'experience_years'=> 'numeric|min:1',
            'active'=> 'numeric|min:1',
            'state'=> 'required|max:191', 
            'city'=> 'required|max:191', 
            'state1'=> 'required|max:191', 
            'city1'=> 'required|max:191', 
            'state2'=> 'required|max:191', 
            'city2'=> 'required|max:191', 
            'state3'=> 'required|max:191', 
            'city3'=> 'required|max:191', 
            'state4'=> 'required|max:191', 
            'city4'=> 'required|max:191', 
            'qualification'=> 'numeric|min:1',
            'certificate'=> 'numeric|min:1',            
            'skills'=> 'required|max:191',
            'salary_expected'=> 'numeric|min:1',
            ],
            [
                'experience_level.min' => 'Please choose a Experience.',
                'experience_years.min' => 'Please choose a Years.',
                'qualification.min' => 'Please choose a qualification.',
                'certificate.min' => 'Please choose a certificate.',
                'active.min' => 'Please choose a status.',
            ]
        );
        $id1 = Auth::id();

        $profile = new Profile;
        $profile->title = $request->title;
        $profile->employer = $request->employer;
        $profile->experience_level = $request->experience_level;
        $profile->experience_years = $request->experience_years;
        $profile->active = $request->active;
        $profile->state = $request->state;
        $profile->city = $request->city;
        $profile->state1 = $request->state1;
        $profile->city1 = $request->city1;
        $profile->state2 = $request->state2;
        $profile->city2 = $request->city2;
        $profile->state3 = $request->state3;
        $profile->city3 = $request->city3;
        $profile->state4 = $request->state4;
        $profile->city4 = $request->city4;
        $profile->qualification = $request->qualification;
        $profile->certificate = $request->certificate;
        $profile->skills = $request->skills;
        $profile->salary_expected = $request->salary_expected;
        $profile->user_id = $id1;
        $profile->save();

        Alert::success('Success', 'You have successfully created Profile')->showConfirmButton('Ok','#3085d6')->autoClose(25000);
        return redirect()->route('profiles.create');

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
