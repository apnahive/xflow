<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task_template;
use App\Task_for_template;

class Task_for_templateController extends Controller
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
        $task_templates = Task_template::all();
        return view('task_for_templates.create', compact('task_templates'));
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
            'template_id'=> 'numeric|min:1',
            'title'=> 'required|max:20',            
            'category'=> 'numeric|min:1',
            'estimated_time_to_complete'=> 'numeric|min:1',
            'note'=> 'required|max:191',
        ));
        $task = new Task_for_template;
        $task->task_template_id = $request->template_id;
        $task->title = $request->title;        
        $task->category = $request->category;
        $task->estimated_time_to_complete = $request->estimated_time_to_complete;        
        $task->note = $request->note;        
        
        $task->save();
        return redirect()->route('tasks.index')->with('success', 'You have successfully added Task');
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
