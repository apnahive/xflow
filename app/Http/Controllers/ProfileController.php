<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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
            }
        }
        //dd($signed);
        return view('profile.index', compact('user1', 'signed', 'status', 'project_users'));
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
        $id1 = Auth::id();
        ini_set('max_execution_time', 900);
        $signed = Form_sign::find($id);
        

        $form = Project_form::find($signed->form_id);
        $project = Project::find($form->project_id);
        //dd($project);
        $filename = $project->name.'.pdf';
        //
        $form_files = Form_file::where('project_id', $form->project_id)->get();
        //dd($form_files);
        $user_forms = User_form::where('form_id', $form->id)->get();
                

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





        $sign = Form_sign::where('status', true)->where('user_id', $id1)->where('form_id', $form->id)->first();
        $path = storage_path('form_sign/'.$sign->sign);
        
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);


        //dd($user_forms);
        //return view('form-signed', compact('form', 'form_files', 'id1', 'sign', 'user_forms', 'base64'));        


        $pdf = PDF::setOptions([
            'images' => true
        ])->loadView('form-signed', compact('form', 'form_files', 'id1', 'sign', 'user_forms', 'base64'));
        

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
