<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project_file;
use RealRashid\SweetAlert\Facades\Alert;

class FileUploadController extends Controller
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
        $this->validate($request, [
            'file' => 'required|mimes:doc,pdf,docx,zip|max:4048',
        ]);
        $uploadfile = new Project_file;
        $uploadfile->project_id = $request->project_id;

        $file_name = $request->file('file')->getClientOriginalName();
        //dd($file_name);
        $file = $request->file('file');
        //dd($file);
        $input['file'] = time().'.'.$file->getClientOriginalExtension();

        $destinationPath = storage_path('/project/'); 

        $file->move($destinationPath, $input['file']);



        $uploadfile->file = $input['file'];
        $uploadfile->file_name = $file_name;
        $uploadfile->save();
        Alert::success('Success', 'You have successfully Uploaded file in project')->showConfirmButton('Ok','#3085d6')->autoClose(15000);
        return redirect()->route('projects.show', $request->project_id)->with('success', 'You have successfully Uploaded file in project');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fullpath="project/{$id}";
        //dd($fullpath);
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
