<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project_form;
use App\Project;
use App\Form_file;
use App\User;
use App\User_form;
use App\Form_sign;
use App\Form_section;
use App\Form_initial;
//use App\Form_section;
use App\Project_user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PDF;
use File;
use RealRashid\SweetAlert\Facades\Alert;
use Mail;
use App\Mail\Form_signed;

class Form_signController extends Controller
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

    public function getUrl($id)
    {
        $fullpath="form_sign/{$id}";
        return response()->download(storage_path($fullpath), null, [], null);
    }
    /*public function viewimage($file)
    {
        $response = new BinaryFileResponse($file->getAbsolutePath());
        $response->headers->set('Content-Disposition', 'inline; filename="' . $file->real_filename . '"');
        $response->headers->set('Access-Control-Allow-Origin' , '*');
        $response->headers->set('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, DELETE');
        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, Accept, Authorization, X-Requested-With, Application');
        return $response;
    }*/

    public function index()
    {   
        $id1 = 5; //user id
        $id = 1; //form id
        $form = Project_form::find($id);        
            
        
        
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
        //dd($user_forms);
        if(Project_user::where('project_id', $form->project_id)->where('user_id', $id1)->exists())
        {
            $form_files = Form_file::where('project_id', $form->project_id)->get();
            $sign = Form_sign::where('user_id', $id1)->where('form_id', $form->id)->first();
            
            $fullpath = "form_sign/{$sign->sign}";
            //dd('input');
            //dd($user_forms);
            return view('form-signed', compact('form', 'form_files', 'id1', 'fullpath', 'sign', 'user_forms'));
        }
        else
        {
            return view('errors.401');   
        }
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
        $id1 = Auth::id();
        //dd($id);
        $form = Project_form::find($id);
        //dd($form);
        $sections = Form_section::where('form_id', $id)->get();
        if(Form_sign::where('status', true)->where('user_id', $id1)->where('form_id', $form->id)->exists())
            return view('errors.401');
            
        
        //->where('status', false)->where('user_id', $id1)->get();
        //$access = Project_user::where('project_id', $form->project_id)->where('user_id', $id1)->get();
        //dd($form);
        if(Project_user::where('project_id', $form->project_id)->where('user_id', $id1)->exists())
        {
            $form_files = Form_file::where('project_id', $form->project_id)->get();

            return view('form_sign.edit', compact('form', 'form_files', 'id1', 'sections'));
        }
        else
        {
            return view('errors.401');   
        }
        
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
        //dd(request()->all());
        $this->validate($request, [
            'sign' => 'required|mimes:jpeg,png,jpg,gif,svg|max:4048',
        ]);
        
        $id1 = Auth::id();
        $form_id = $request->form_id;

        $form = Project_form::find($form_id);
        if(User_form::where('form_id',$form_id)->where('user_id',$id1)->exists())
        {
            $oldform = User_form::where('form_id',$form_id)->where('user_id',$id1);
            $oldform->delete();
        }
        if(User_form::where('form_id',$form_id)->where('user_id',$id1)->where('section_id', 0)->exists())
        {
            $userform = User_form::where('form_id',$form_id)->where('user_id',$id1)->where('section_id', 0)->first();
            $userform->description = $form->description;    
            $userform->save();
        }
        else
        {
            $userform = new User_form;
            $userform->description = $form->description;
            $userform->form_id = $form_id;
            $userform->user_id = $id1;
            $userform->section_id = 0;
            $userform->save();    
        }
        


        $sections = Form_section::where('form_id',$form_id)->get();
        $form_files = Form_file::where('project_id', $form->project_id)->get();

        if(Form_sign::where('status', false)->where('user_id', $id1)->where('form_id', $form_id)->exists())
        {

            if(count($sections) > 0)
            {
                foreach ($sections as $sectionkey => $section) 
                {
                    if(User_form::where('form_id',$form_id)->where('user_id',$id1)->where('section_id', $section->id)->exists())
                    {
                        $userform = User_form::where('form_id',$form_id)->where('user_id',$id1)->where('section_id', $section->id)->first();
                        $userform->description = $section->description;    
                        $userform->save();
                    }
                    else
                    {
                        $userform = new User_form;
                        $userform->description = $section->description;
                        $userform->form_id = $form_id;
                        $userform->user_id = $id1;
                        $userform->section_id = $section->id;
                        $userform->save();    
                    }

                    $initial = 'section'.$sectionkey;
                    if(Form_initial::where('form_id',$form_id)->where('user_id',$id1)->where('section_id',$section->id)->exists())
                    {                        
                        $initials = Form_initial::where('form_id',$form_id)->where('user_id',$id1)->where('section_id',$section->id)->first();
                        $initials->initials = $request->$initial;
                        $initials->save();
                    }
                    else
                    {
                        $initials = new Form_initial;
                        $initials->initials = $request->$initial;
                        $initials->form_id = $form_id;
                        $initials->user_id = $id1;
                        $initials->section_id = $section->id;
                        $initials->save();
                    }
                }
            }
            $sign = Form_sign::where('status', false)->where('user_id', $id1)->where('form_id', $form_id)->first();
            $sign->status = true;

            //sign upload
            $file = $request->file('sign');
            
            $input['file'] = time().'.'.$file->getClientOriginalExtension();

            $destinationPath = storage_path('/form_sign/'); 

            $file->move($destinationPath, $input['file']);
            //dd($file);


            $sign->sign = $input['file'];

            $sign->save();
            $fullpath = "form_sign/{$sign->sign}";            
            $imagepath = $fullpath;
            //dd($fullpath);
        }
        //$fullpath = "form_sign/".$sign->sign;            
        //$imagepath = $fullpath;
        //$path1 = route('images.show', $sign->sign);
        /*$sign = Form_sign::where('status', true)->where('user_id', $id1)->where('form_id', $form_id)->first();
        $path = storage_path('form_sign/'.$sign->sign);
        
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);        
        $pdf = PDF::setOptions([
            'images' => true
        ])->loadView('form-signed', compact('form', 'form_files', 'id1', 'sign', 'imagepath', 'base64'));
        
        $name = '/sign_documents/sign'.$id1.'form'.$form_id.'.pdf';
        $pdf->save(storage_path($name));*/
        //$pdf->move($destinationPath, $pdf);

        $user1 = User::findOrFail($id1);
        $project = Project::find($form->project_id);
        $user2 = User::find($project->poc);
        Mail::to($user2['email'])->send(new Form_signed($user1, $project));

        Alert::success('Success', 'You have successfully signed the document')->showConfirmButton('Ok','#3085d6')->autoClose(15000);
        return redirect()->route('home')->with('success', 'You have successfully signed the document');
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
