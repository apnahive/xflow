<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project_form;
use App\Form_file;
use App\User;
use App\Form_sign;
use App\Project_user;
use Mail;
use App\Mail\Sign_form;
use App\Attestation;
use RealRashid\SweetAlert\Facades\Alert;

class Project_formController extends Controller
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
        //dd(request()->all());
        $this->validate($request, array(
            'form_files.*' => 'required|mimes:doc,pdf,docx,zip|max:4048',[
                'form_files.*.required' => 'Please upload an file',
                'form_files.*.mimes' => 'Only doc,pdf,docx files are allowed',
                'form_files.*.max' => 'Sorry! Maximum allowed size for an size is 2MB',
            ],            
        ));
        if($request->summernote)
        {}
        else
        {
            $attestation = Attestation::find(3);
            $request->summernote = $attestation->description;

        }
        if(Project_form::where('project_id', $request->project_id)->exists())
        {
            $form = Project_form::where('project_id', $request->project_id)->first();
            //$form->project_id = $request->project_id;
            $form->description = $request->summernote;
            $form->save();
        }
        else
        {
            $form = new Project_form;
            $form->project_id = $request->project_id;
            $form->description = $request->summernote;
            $form->save();
        }
        $form_files = $request->form_files;
        
        if(count($form_files)>0)
        {
            foreach ($form_files as $key => $value) 
            {
                //dd($form_files);
                $uploadfile = new Form_file;
                $uploadfile->project_id = $request->project_id;

                $uploadfile->form_id = $form->id;

                $file = $value;
                $file_name = $value->getClientOriginalName();
                //dd($file_name);
                $input['file'] = time().'.'.$file->getClientOriginalExtension();

                $destinationPath = storage_path('/form_files/'); 

                $file->move($destinationPath, $input['file']);

                $uploadfile->file = $input['file'];
                $uploadfile->file_name = $file_name;
                $uploadfile->save();
                
            }
        }

        $users = Project_user::where('project_id', $form->project_id)->get();
        foreach ($users as $userkey => $user) 
        {
            
            $mailuser = User::find($user->user_id);
            //dd($mailuser);
            if(Form_sign::where('user_id',$user->id)->where('form_id', $form->id)->exists())
            {
                $sign = Form_sign::where('user_id',$user->id)->where('form_id', $form->id)->first();
                if($request->send_all)
                {
                    $sign->status = 0;
                    # mail send  link to sign document...
                    Mail::to($mailuser['email'])->send(new Sign_form($form->id, $mailuser));
                }
            }
            else
            {
                $sign = new Form_sign;
                $sign->form_id = $form->id;
                $sign->user_id = $mailuser->id;
                $sign->status = 0;

                # mail send  link to sign document...
                Mail::to($mailuser['email'])->send(new Sign_form($form->id, $mailuser));
                
            }
            
            
            



            $sign->save();
            //dd($sign);
        }
        Alert::success('Success', 'You have successfully saved and send mails to users')->showConfirmButton('Ok','#3085d6')->autoClose(15000);
        return redirect()->route('projects.show', $request->project_id)->with('success', 'You have successfully saved and send mails to users');
        //dd('files accepted');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fullpath="form_files/{$id}";
        return response()->download(storage_path($fullpath), null, [], null);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $form = Project_form::find($id);
        //dd($form);
        return view('project_forms.edit', compact('form'));
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
            'summernote'=> 'required|max:15048',
        ));
        $form = Project_form::find($id);
        $form->description = $request->summernote;
        $form->save();
        Alert::success('Success', 'You have successfully Updated the form')->showConfirmButton('Ok','#3085d6')->autoClose(15000);
        return redirect()->route('projects.show', $form->project_id)->with('success', 'You have successfully Updated the form');
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
