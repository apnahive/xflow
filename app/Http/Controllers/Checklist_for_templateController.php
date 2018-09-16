<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Checklist_template;
use App\Checklist_for_template;
use RealRashid\SweetAlert\Facades\Alert;

class Checklist_for_templateController extends Controller
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
        $checklist_templates = Checklist_template::all();
        return view('checklist_for_templates.create', compact('checklist_templates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'template_id'=> 'numeric|min:1',
            'title'=> 'required|max:20',
        ));
        $checklist = new Checklist_for_template;
        $checklist->template_id = $request->template_id;
        $checklist->title = $request->title;        
        
        $checklist->save();
        Alert::success('Success', 'You have successfully added Checklist')->showConfirmButton('Ok','#3085d6')->autoClose(15000);
        return redirect()->route('checklists.index')->with('success', 'You have successfully added Checklist');
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