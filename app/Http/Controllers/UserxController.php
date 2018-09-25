<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth; 
use RealRashid\SweetAlert\Facades\Alert;
use App\Form_sign;
use App\Project;
use App\Project_form;
use App\Project_user;
use Mail;
use App\Mail\User_approved;
use App\Mail\User_rejected;

class UserxController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'isAdmin']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('id', '!=', 1)->paginate(15); 
        return view('userx.index')->with('users', $users);
    }

    public function approve($id)
    {
        $user = User::find($id);
        $user->verified = 1;
        $user->verification_token = null;
        $user->save();

        Mail::to($user['email'])->send(new User_approved($user));

        Alert::success('Success', 'You have successfully Approved User')->showConfirmButton('Ok','#3085d6')->autoClose(15000);
        return redirect()->route('users.index');
    }

    public function reject($id)
    {
        $user = User::find($id);
        $user->verified = 0;
        $user->verification_token = null;
        $user->save();

        Mail::to($user['email'])->send(new User_rejected($user));

        Alert::success('Success', 'You have successfully Rejected User')->showConfirmButton('Ok','#3085d6')->autoClose(15000);
        return redirect()->route('users.index');
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
        $user1 = User::find($id);
        $signed = Form_sign::where('user_id', $id)->where('status', 1)->get();
        foreach ($signed as $key => $value) 
        {
            $project_id = Project_form::find($value->form_id);
            $project = Project::find($project_id->project_id);
            $value->project = $project->name;
        }
        $status = Form_sign::where('user_id', $id)->get();
        if(count($status))
        {
            foreach ($status as $key => $value) 
            {
                $form = Project_form::find($value->form_id);
                $project_name = Project::find($form->project_id);
                $value->name = $project_name->name;
            }
        }
        $project_users = Project_user::where('user_id', '=', $id)->get();
        if(count($project_users))
        {
            foreach ($project_users as $project_userkey => $value1) 
            {
                //$form = Project_form::find($value->form_id);
                $project_name = Project::find($value1->project_id);
                $value1->name = $project_name->name;
                $value1->duedate = $project_name->duedate;
                $poc = User::find($project_name->poc);
                $value1->pocname = $poc->name;
                $cco = User::find($project_name->cco);
                $value1->cconame = $cco->name;
            }
        }

        //dd($project_users);
        return view('userx.show', compact('user1', 'signed', 'status', 'project_users'));
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
