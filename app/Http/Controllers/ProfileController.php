<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Job;
use App\Form_sign;
use App\Project;
use App\Project_form;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Form_file;
use App\User_form;
use App\Form_section;
use App\Form_initial;
use App\Project_user;
use App\Client_profile;
use Illuminate\Support\Facades\Storage;
use PDF;
use File;

class ProfileController extends Controller
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
        $id1 = Auth::id();
        $user1 = User::find($id1);
        $signed = Form_sign::where('user_id', $id1)->where('status', 1)->get();
        foreach ($signed as $key => $value) 
        {
            $project_id = Project_form::find($value->form_id);
            $project = Project::find($project_id->project_id);
            $value->project = $project->name;
        }
        $status = Form_sign::where('user_id', $id1)->get();
        if(count($status))
        {
            foreach ($status as $key => $value) 
            {
                $form = Project_form::find($value->form_id);
                $project_name = Project::find($form->project_id);
                $value->name = $project_name->name;
            }
        }
        $project_users = Project_user::where('user_id', '=', $id1)->get();
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

        $jobs = Job::where('user_id', $id1)->get();
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
        $details = Client_profile::where('user_id', $id1)->first();
        //dd($details);
        return view('profile.index', compact('user1', 'signed', 'status', 'project_users', 'jobs', 'details'));
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
        //dd('download is hitted');
        
        ini_set('max_execution_time', 900);
        $signed = Form_sign::find($id);
        $id1 = $signed->user_id;

        $form = Project_form::find($signed->form_id);
        $project = Project::find($form->project_id);
        //dd($project);
        $filename = $project->name.'.pdf';
        //
        $form_files = Form_file::where('project_id', $form->project_id)->get();
        //dd($form_files);
        $user_forms = User_form::where('form_id', $form->id)->where('user_id', $id1)->get();
                

        foreach ($user_forms as $user_formkey => $user_form) 
        {
            if($user_form->section_id == 0)
                $user_form->initials = false;
            else
            {
                if(Form_initial::where('form_id', $form->id)->where('user_id', $id1)->where('section_id', $user_form->section_id)->exists())
                {
                    $initial = Form_initial::where('form_id', $form->id)->where('user_id', $id1)->where('section_id', $user_form->section_id)->first();
                    //dd($initial);
                    $user_form->initials = $initial->initials;
                }
            }
        }





        $sign = Form_sign::find($id);
        //dd($signed, $sign, $id1, $form);
        if($sign->sign)
        {
            $path = storage_path('form_sign/'.$sign->sign);
            
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        }
        else
        {
            $path = null;
            
            $type = null;
            $data = null;
            $base64 = null;   
        }


        //dd($user_forms);
        //return view('form-signed', compact('form', 'form_files', 'id1', 'sign', 'user_forms', 'base64'));        
        //return view('form-signed', compact('form', 'form_files', 'id1', 'sign', 'user_forms', 'base64'));

        $pdf = PDF::setOptions([
            'images' => true
        ])->loadView('form-signed', compact('form', 'form_files', 'id1', 'sign', 'user_forms', 'base64'));
        
        //return view('form-signed', compact('form', 'form_files', 'id1', 'sign', 'user_forms', 'base64'));
        //dd($pdf);

        return $pdf->download($filename);

        /*$name = '/sign_documents/sign'.$id1.'form'.$form_id.'.pdf';
        $pdf->save(storage_path($name));*/
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
