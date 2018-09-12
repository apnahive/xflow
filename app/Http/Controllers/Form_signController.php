<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project_form;
use App\Form_file;
use App\User;
use App\Form_sign;
use App\Project_user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PDF;
use File;

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
        //Mail::to('dev.sadiquee@gmail.com')->send(new Form_sign(3));
        $id1 = 5;
        $id = 1;
        $form = Project_form::find($id);
        if(Form_sign::where('status', true)->where('user_id', $id1)->where('form_id', $form->id)->exists())
        {

        }        
        else    
            return view('errors.401');
            
        
        //->where('status', false)->where('user_id', $id1)->get();
        //$access = Project_user::where('project_id', $form->project_id)->where('user_id', $id1)->get();
        //dd($form);
        if(Project_user::where('project_id', $form->project_id)->where('user_id', $id1)->exists())
        {
            $form_files = Form_file::where('project_id', $form->project_id)->get();
            $sign = Form_sign::where('user_id', $id1)->where('form_id', $form->id)->first();
            //dd($sign);
            $fullpath = "form_sign/{$sign->sign}";
            //$imagepath = Storage::url($fullpath);
            //$imagepath = $this->getUrl($sign->sign);
            //$url = $this->viewimage($imagepath);
            //$url = $imagepath->getPathname();
            //$imagepath = storage_path($fullpath);
            $imagepath = $fullpath;

            /*$image = File::get($imagepath);

            return response()->make($image, 200, ['content-type' => 'image/jpg']);*/
            //$imagepath = Storage::get($fullpath);
            //$imagepath = 'data:'.mime_content_type($full_path) . ';base64,' . $base64;
            //$file = File::get($imagepath);
            //dd($imagepath);

            //$imagepath = storage_path($fullpath);
            return view('form-signed', compact('form', 'form_files', 'id1', 'imagepath'));
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
        if(Form_sign::where('status', true)->where('user_id', $id1)->where('form_id', $form->id)->exists())
            return view('errors.401');
            
        
        //->where('status', false)->where('user_id', $id1)->get();
        //$access = Project_user::where('project_id', $form->project_id)->where('user_id', $id1)->get();
        //dd($form);
        if(Project_user::where('project_id', $form->project_id)->where('user_id', $id1)->exists())
        {
            $form_files = Form_file::where('project_id', $form->project_id)->get();
            return view('form_sign.edit', compact('form', 'form_files', 'id1'));
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
        ini_set('max_execution_time', 900);
        $id1 = Auth::id();
        $form_id = $request->form_id;

        $form = Project_form::find($form_id);
        $form_files = Form_file::where('project_id', $form->project_id)->get();

        if(Form_sign::where('status', false)->where('user_id', $id1)->where('form_id', $form_id)->exists())
        {
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
        

        $pdf = PDF::loadView('form-signed', compact('form', 'form_files', 'id1', 'sign', 'imagepath'));
        //return $pdf->download('form-signed.pdf');
        //$destinationPath1 = storage_path('/sign_documents/'); 
        $name = '/sign_documents/sign'.$id1.'form'.$form_id.'.pdf';
        $pdf->save(storage_path($name));
        //$pdf->move($destinationPath, $pdf);

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
