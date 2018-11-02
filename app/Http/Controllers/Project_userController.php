<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Project_user;
use RealRashid\SweetAlert\Facades\Alert;

class Project_userController extends Controller
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
        dd(request()->all());
        $project = Project::find($id);
        $users = $request->users;
        $no_users = $request->no_user;
       // dd($no_users);
        if($users)
        {
        foreach ($users as $key => $value) 
        {
            if(Project_user::where('user_id', '=', $value)->where('project_id', '=', $project->id)->exists())
            {

            }
            else
            {
                $project_user = new Project_user;
                $project_user->project_id = $project->id;
                $project_user->user_id = $value;
                if($project->poc == $value)
                    $project_user->status = 1;
                elseif($project->cco == $value)
                    $project_user->status = 2;
                else
                    $project_user->status = 3;
            
                $project_user->save();    
            }
            
        }
        }
        if($no_users)
        {
            //dd($no_users);
            foreach ($no_users as $no_key => $no_value) 
            {
                if(Project_user::where('user_id', '=', $no_value)->where('project_id', '=', $project->id)->exists())
                {
                    $project_user = Project_user::where('user_id', '=', $no_value)->where('project_id', '=', $project->id);
                    $project_user->delete();
                }
                else
                {
                    
                }
            }
        }
        Alert::success('Success', 'You have successfully updated users in client')->showConfirmButton('Ok','#3085d6')->autoClose(15000);
        return redirect()->route('projects.show', $id)->withInput(['tab'=>'custom-nav-task']);

    }
    /*public function update(Request $request, $id)
    {
        dd(request()->all());
        $project = Project::find($id);
        $users = $request->users;
        $no_users = $request->no_user;
        dd($no_users);
        if(count($users))
        {
        foreach ($users as $key => $value) 
        {
            if(Project_user::where('user_id', '=', $value)->where('project_id', '=', $project->id)->exists())
            {

            }
            else
            {
                $project_user = new Project_user;
                $project_user->project_id = $project->id;
                $project_user->user_id = $value;
                if($project->poc == $value)
                    $project_user->status = 1;
                elseif($project->cco == $value)
                    $project_user->status = 2;
                else
                    $project_user->status = 3;
            
                $project_user->save();    
            }
            
        }
        }
        if(count($no_users))
        {
            foreach ($no_users as $no_key => $no_value) 
            {
                if(Project_user::where('user_id', '=', $no_value)->where('project_id', '=', $project->id)->exists())
                {
                    $project_user = Project_user::where('user_id', '=', $no_value)->where('project_id', '=', $project->id);
                    $project_user->delete();
                }
                else
                {
                    
                }
            }
        }
        Alert::success('Success', 'You have successfully updated users in client')->showConfirmButton('Ok','#3085d6')->autoClose(15000);
        return redirect()->route('projects.show', $id)->withInput(['tab'=>'custom-nav-users']);

    }*/

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
