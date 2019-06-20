<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\State;
use App\City;
use App\User;
use App\Job;
use App\Client_profile;
use RealRashid\SweetAlert\Facades\Alert;

class Client_profileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$profiles = Client_profile::all();
        $profiles = User::permission('can create job')->get();
        //dd($profiles);
        foreach ($profiles as $key => $value) 
        {
            $user = User::find($value->id);
            $value->name = $user->name.' '.$user->lastname;
            $jobs = Job::where('user_id', $value->id)->count();
            $value->jobs = $jobs;
            
        }
        $id1 = Auth::id();
        $checkadmin = User::find($id1);        
        $checkadmins = $checkadmin->hasRole('Admin');

        if($checkadmins)
            return view('client_profiles.index', compact('profiles'));
        else
            return view('errors.401');
    }

    public function sort($feild, $type)
    {
        $profiles = Client_profile::join('users', 'client_profiles.user_id', '=', 'users.id')->select('users.name', 'users.lastname', 'client_profiles.id', 'client_profiles.company_name', 'client_profiles.user_id')->orderBy($feild, $type)->paginate(15);
        foreach ($profiles as $key => $value) 
        {
            $user = User::find($value->user_id);
            $value->name = $user->name.' '.$user->lastname;
            $jobs = Job::where('user_id', $value->user_id)->count();
            $value->jobs = $jobs;
            
        }
        $id1 = Auth::id();
        $checkadmin = User::find($id1);        
        $checkadmins = $checkadmin->hasRole('Admin');

        if($checkadmins)
            return view('client_profiles.index', compact('profiles'));
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
        /*$id1 = Auth::id();
        if(Client_profile::where('user_id', '=', $id1)->exists())
        {
            $profile = Client_profile::where('user_id', '=', $id1)->first();
            //dd($profile);
            return redirect()->route('client_profiles.show', $profile->id);
        }
        
        

        $states = State::all();
        $cities = City::select('city')->distinct()->get();
        //dd($cities);
        if (Auth::user()->hasPermissionTo('can apply job'))
            return view('client_profiles.edit', compact('states', 'cities'));
        else
            return view('errors.401');*/
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$profile = Profile::where('user_id', $id)->first();
        //dd('this is the test');
        $details = Client_profile::where('user_id', $id)->first();
        /*if(Client_profile::where('user_id', '=', $id1)->exists())
        {
            
        }
        else
        {
            return redirect()->route('client_profiles.show', $id1);
        }*/
        $user = User::find($id);


        
        $states = State::all();
        $cities = City::select('city')->distinct()->get();
        //dd($cities);
        if (Auth::user()->hasPermissionTo('can create job'))
            return view('client_profiles.show', compact('states', 'cities', 'user', 'details'));
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
        $user = User::find($id);

        //$id1 = Auth::id();
        $details = Client_profile::where('user_id', '=', $id)->first();
        //$user = User::find($profile->user_id);
        //$profile = Profile::find($id);
        $states = State::all(); 
        $cities = City::select('city')->distinct()->get();

        if (Auth::user()->hasPermissionTo('can create job'))
            return view('client_profiles.edit', compact('states', 'cities', 'profile', 'user', 'details'));
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
            'company_name'=> 'required|max:191', 
            'phonenumber'=> 'required|max:191',
            'address'=> 'required|max:191',
            'zip'=> 'required|max:191', 
            'state'=> 'required|max:191',
            'city'=> 'required|max:191',
        ));
        
        
        $user = User::find($id);
        $details = Client_profile::where('user_id', '=', $id)->first();

        //user details
        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->phonenumber = $request->phonenumber;
        //location from professional details
        /*$profile->state = $request->state;
        $profile->city = $request->city;*/
        //candidate details
        if($details)
        {
            $details->company_name = $request->company_name;
            $details->state = $request->state;
            $details->city = $request->city;
            $details->address = $request->address;
            $details->zip = $request->zip;
            $details->save();
        }
        else
        {
            $details = new Client_profile;
            $details->company_name = $request->company_name;
            $details->state = $request->state;
            $details->city = $request->city;
            $details->address = $request->address;
            $details->zip = $request->zip;
            $details->user_id = $user->id;
            $details->save();
        }
        $details->save();
        $user->save();

        Alert::success('Success', 'You have successfully updated Profile')->showConfirmButton('Ok','#3085d6')->autoClose(25000);
        return redirect()->route('client_profiles.show', $id);
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
