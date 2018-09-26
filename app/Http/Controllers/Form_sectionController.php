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
        /*$form = new Form_section;
        $form->name = ' ';
        $form->description = ' ';
        //$form->form_id = $id;
        $form->save();*/
        //dd($form);

        return view('form_sections.edit', compact('form'));
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
            'summernote'=> 'required|max:15048',
        ));        
        $form = new Form_section;
        $form->description = $request->summernote;
        $form->form_id = $request->form_id;
        $form->name = ' ';
        $form->save();
        Alert::success('Success', 'You have successfully created the form section')->showConfirmButton('Ok','#3085d6')->autoClose(15000);
        return redirect()->route('project_forms.edit', $form->form_id)->with('success', 'You have successfully created the form section');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function add($id)
    {
        return view('form_sections.add', compact('id'));
    }

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
        //dd(request()->all());
        $this->validate($request, array(
            'summernotex'=> 'required|max:15048',
        ));        
        $form = Form_section::find($id);
        $form->description = $request->summernotex;
        $form->save();
        Alert::success('Success', 'You have successfully Updated the section')->showConfirmButton('Ok','#3085d6')->autoClose(15000);
        return redirect()->route('project_forms.edit', $form->form_id)->with('success', 'You have successfully Updated the form');
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
