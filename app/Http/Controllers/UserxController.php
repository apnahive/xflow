<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Job;
use Auth; 
use RealRashid\SweetAlert\Facades\Alert;
use App\Form_sign;
use App\Project;
use App\Task;
use DateTime;
use App\Project_form;
use App\Project_user;
use Hash;
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
        $useradmin = User::role('Admin')->select('id')->get();        
        $users = User::whereNotIn('id', $useradmin)->paginate(15);
        //$users = User::where('id', '!=', 1)->paginate(15); 
        return view('userx.index')->with('users', $users);
    }
    public function search(Request $request)
    {
        //dd(request()->all());
        $useradmin = User::role('Admin')->select('id')->get();

        //dd($request->type);
        if($request->name == null && $request->email == null && ctype_digit(strval($request->type)))
        {
            //dd('not found');
            return redirect()->route('users.index');
        }
        else
        {
            $search = $request;
            //dd($request->type);
            //dd(!$request->type == 0);
            if(!$request->type == 0)
            {
                $search->type = $request->type;
                $search->email = null;
                $search->name = null;
                //dd('type');
                $users = User::where('user_type', 'like', $request->type)->get();                
            }
            if($request->email)
            {
                $search->name = null;
                $search->email = $request->email;
                $search->type = null;
                
                $users = User::where('email', 'like', '%'.$request->email.'%')->get();
                //dd($tasks);
            }
            if($request->name)
            {
                $search->name = $request->name;
                $search->email = null;
                $search->type = null;
                
                $users = User::where('name', 'like', '%'.$request->name.'%')->orWhere('lastname', 'like', '%'.$request->name.'%')->get();
                //dd($tasks);
            }
        }


        //$users = User::whereNotIn('id', $useradmin)->paginate(15);
        //$users = User::where('id', '!=', 1)->paginate(15); 
        return view('userx.search', compact('users', 'search'));
    }
    public function sort($feild, $type)
    {
        $useradmin = User::role('Admin')->select('id')->get();        
        $users = User::whereNotIn('id', $useradmin)->orderBy($feild, $type)->paginate(15);
        //$users = User::where('id', '!=', 1)->paginate(15); 
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
        //dd($status);
        if(count($status))
        {
            foreach ($status as $key => $value) 
            {
                $form = Project_form::find($value->form_id);
                //dd($form);
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
        $now = new \DateTime();
        $tasks = Task::where('assignee', $id)->get();
        $tasks->red = 0;
        $tasks->yellow = 0;
        $tasks->green = 0;
        $tasks->lightgreen = 0;
        foreach ($tasks as $key => $value) 
        {
            $date1 = new DateTime($value->duedate);
            $d = date_diff($now, $date1);
            //dd($now, $date1, $d, $d->days);
            if($d->days > 90 && $d->invert == 0) //for the dashboard
                $tasks->green++;
            elseif($d->days <= 30 && $d->days > 7 && $d->invert == 0) //for the dashboard
                $tasks->lightgreen++;
            elseif($d->days <= 7 && $d->invert == 0)
                $tasks->yellow++;
            if($d->invert)
                $tasks->red++;
        }

        $poc = Project::where('poc', $id)->get();
        $poc->task = 0;
        $poc->project = count($poc);
        foreach ($poc as $pockey => $value) 
        {
            $poctask = Task::where('assignee', $id)->where('project_id', $value->id)->get();
            $poc->task = $poc->task + count($poctask);
        }

        $cco = Project::where('cco', $id)->get();
        $cco->task = 0;
        $cco->project = count($poc);
        foreach ($cco as $ccokey => $value1) 
        {
            $ccotask = Task::where('assignee', $id)->where('project_id', $value1->id)->get();
            $cco->task = $cco->task + count($ccotask);
        }

        $other_task = count($tasks) - ($poc->task + $cco->task);
        //dd($other_task);
        $tasks->remaining = $other_task;


        // Jobs
        $userrole = $user1->hasRole('Recuriter');
        //dd($userrole);
        $jobs = Job::where('user_id', $id)->get();
        $jobs->role = $userrole;
        /*$profile_exist = Profile::select('user_id')->get();
        $candidates = User::whereIn('id', $profile_exist)->get();*/

        foreach ($jobs as $jobkey => $value) 
        {
            switch ($value->experience_years) 
            {
                case '1':
                    $value->experience = '0-2 Years';
                    break;
                case '2':
                    $value->experience = '2-5 Years';
                    break;
                case '5':
                    $value->experience = '5+ Years';
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



        //dd($project_users);
        return view('userx.show', compact('user1', 'signed', 'status', 'project_users', 'tasks', 'poc', 'cco', 'jobs'));
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
        return view('userx.edit', compact('user'));
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
           'old_password' => 'required|string|min:6',
           'new_password' => 'required|string|min:6',
           'password_confirmation' => 'required|string|same:new_password',
        ));

        $profile = User::find($id);
        $old_password = $request->old_password;
        $cpassword = $profile->password;
        if (Hash::check($old_password, $cpassword)) 
        {
            //store in database
            $profile->password = Hash::make($request->new_password);
            $profile->save();
            //return redirect()->route('profile')->with('success','Password is updated sucessfully');
            Alert::success('Success', 'Password is Updated')->showConfirmButton('Ok','#3085d6')->autoClose(25000);
            return redirect()->route('home');
        }
        else
        {
            Alert::error('Failed', 'Password is not matched')->showConfirmButton('Ok','#3085d6')->autoClose(25000);
            return redirect()->back()->with('password','Password is not matched');
        }
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
