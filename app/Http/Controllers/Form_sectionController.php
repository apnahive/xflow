<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Form_section;
use RealRashid\SweetAlert\Facades\Alert;

class Form_sectionController extends Controller
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
        $form = new Form_section;
        $form->name = ' ';
        $form->description = ' ';
        $form->form_id = $id;
        $form->save();
        //dd($form);

        return view('form_sections.edit', compact('form'));
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
            'summernote'=> 'required|max:15048',
        ));        
        $form = Form_section::find($id);
        $form->description = $request->summernote;
        $form->save();
        Alert::success('Success', 'You have successfully Updated the section')->showConfirmButton('Ok','#3085d6')->autoClose(15000);
        return redirect()->route('project_forms.edit', $form->id)->with('success', 'You have successfully Updated the form');
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
