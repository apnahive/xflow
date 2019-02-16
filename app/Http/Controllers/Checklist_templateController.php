<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Checklist_template;
use App\Checklist_for_template;
use RealRashid\SweetAlert\Facades\Alert;

class Checklist_templateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $checklists = Checklist_template::paginate(15);
        return view('checklist_templates.index', compact('checklists'));  
    }

    public function sort($feild, $type)
    {
        $checklists = Checklist_template::orderBy($feild, $type)->paginate(15);
        return view('checklist_templates.index', compact('checklists'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('checklist_templates.create');
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
            'name'=> 'required|max:191',            
        ));
        $checklist = new Checklist_template;
        $checklist->title = $request->name;        
        $checklist->save();
        Alert::success('Success', 'You have successfully created Template')->showConfirmButton('Ok','#3085d6')->autoClose(15000);
        return redirect()->route('checklist_templates.index')->with('success', 'You have successfully created Template');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $checklist = Checklist_template::find($id);
        $checklist_templates = Checklist_for_template::where('template_id', $id)->get();
        
        return view('checklist_templates.show', compact('checklist', 'checklist_templates'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $checklist = Checklist_template::find($id);
        return view('checklist_templates.edit', compact('checklist'));
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
            'name'=> 'required|max:191',            
        ));
        $checklist = Checklist_template::find($id); 
        $checklist->title = $request->name;        
        $checklist->save();
        Alert::success('Success', 'You have successfully Updated Template')->showConfirmButton('Ok','#3085d6')->autoClose(15000);
        return redirect()->route('checklist_templates.index')->with('success', 'You have successfully created Template');
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
