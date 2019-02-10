<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Candidate_experience;
use RealRashid\SweetAlert\Facades\Alert;

class Candidate_experienceController extends Controller
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
        if (Auth::user()->hasPermissionTo('can apply job'))
            return view('candidate_experiences.create');
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
        $this->validate($request, array(            
            'title'=> 'required|max:191',
            'hours'=> 'numeric|min:1',
        ));

        $id1 = Auth::id();

        $experience = new Candidate_experience;
        $experience->title = $request->title;
        $experience->hours = $request->hours;
        $experience->user_id = $id1;
        $experience->save();

        Alert::success('Success', 'You have successfully added experience to your profile')->showConfirmButton('Ok','#3085d6')->autoClose(25000);
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
        $experience = Candidate_experience::find($id);

        if (Auth::user()->hasPermissionTo('can apply job'))
            return view('candidate_experiences.edit', compact('experience'));
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
        $this->validate($request, array(            
            'title'=> 'required|max:191',
            'hours'=> 'numeric|min:1',
        ));

        //$id1 = Auth::id();

        $experience = Candidate_experience::find($id);
        $experience->title = $request->title;
        $experience->hours = $request->hours;
        //$experience->user_id = $id1;
        $experience->save();

        Alert::success('Success', 'You have successfully updated experience to your profile')->showConfirmButton('Ok','#3085d6')->autoClose(25000);
        return redirect()->route('profiles.create');
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
