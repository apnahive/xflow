<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\State;
use App\City;
use App\User;
use App\Profile;
use App\Candidate_detail;
use RealRashid\SweetAlert\Facades\Alert;

class Candidate_detailController extends Controller
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
        //dd('candidate details edit');
        $profile = Profile::find($id);

        //$id1 = Auth::id();
        $details = Candidate_detail::where('user_id', '=', $profile->user_id)->first();
        $user = User::find($profile->user_id);
        //$profile = Profile::find($id);
        $states = State::all();
        $cities = City::select('city')->distinct()->get();

        if (Auth::user()->hasPermissionTo('can apply job'))
            return view('candidate_details.edit', compact('states', 'cities', 'profile', 'user', 'details'));
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
        $this->validate($request, array(
            'name'=> 'required|max:191',
            'lastname'=> 'required|max:191', 
            'phonenumber'=> 'required|max:191',
            'address'=> 'required|max:191',
            'zip'=> 'required|max:191', 
            'state'=> 'required|max:191',
            'city'=> 'required|max:191',
        ));
        $profile = Profile::find($id);
        $details = Candidate_detail::where('user_id', '=', $profile->user_id)->first();
        $user = User::find($profile->user_id);

        //user details
        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->phonenumber = $request->phonenumber;
        //location from professional details
        $profile->state = $request->state;
        $profile->city = $request->city;
        //candidate details
        if($details)
        {
            $details->address = $request->address;
            $details->zip = $request->zip;
            $details->save();
        }
        else
        {
            $details = new Candidate_detail;
            $details->address = $request->address;
            $details->zip = $request->zip;
            $details->user_id = $user->id;
            $details->save();
        }
        $profile->save();
        $user->save();

        Alert::success('Success', 'You have successfully updated Profile')->showConfirmButton('Ok','#3085d6')->autoClose(25000);
        return redirect()->route('profiles.show', $id);

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
