<?php

namespace App\Http\Controllers;

use App\Team_member;
use Illuminate\Http\Request;
use App\User;
use App\Team;
use App\xflow;
use RealRashid\SweetAlert\Facades\Alert;


class TeamMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add($id)
    {
        //
        $team = Team::find($id);
        $teammember = Team_member::where('team_id', $id)->select('user_id')->get();
        $users = User::where('verified', 1)->whereNotIn('id', $teammember)->get();  //samar- to remove selected users.
        
        $selected_users = User::whereIn('id', $teammember)->get();
        return view('teams.add', compact('team','users','selected_users'));
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
        dd(request()->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Team_member  $team_member
     * @return \Illuminate\Http\Response
     */
    public function show(Team_member $team_member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Team_member  $team_member
     * @return \Illuminate\Http\Response
     */
    public function edit(Team_member $team_member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Team_member  $team_member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd(request()->all());
        $team = Team::find($id);
        $users = $request->users;
        $no_users = $request->no_user;
       // dd($no_users);
        if($users)
        {
            foreach ($users as $key => $value) 
            {
                if(Team_member::where('user_id', '=', $value)->where('team_id', '=', $team->id)->exists())
                {

                }
                else
                {
                    $team_member = new Team_member;
                    $team_member->team_id = $team->id;
                    $team_member->user_id = $value;
                   
                    $team_member->save();    
                }
                
            }
        }
        if($no_users)
        {
            //dd($no_users);
            foreach ($no_users as $no_key => $no_value) 
            {
                if(Team_member::where('user_id', '=', $no_value)->where('team_id', '=', $team->id)->exists())
                {
                    $team_member = Team_member::where('user_id', '=', $no_value)->where('team_id', '=', $team->id);
                    $team_member->delete();
                }
                else
                {
                    
                }
            }
        }
        Alert::success('Success', 'You have successfully updated team members')->showConfirmButton('Ok','#3085d6')->autoClose(15000);
        return redirect()->route('teams.show', $id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Team_member  $team_member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team_member $team_member)
    {
        //
    }
}
