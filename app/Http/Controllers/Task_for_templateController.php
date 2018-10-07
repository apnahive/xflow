<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task_template;
use App\Task_for_template;
use RealRashid\SweetAlert\Facades\Alert;

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
        $this->validate($request, [
            'template_id'=> 'numeric|min:1',
            'title'=> 'required|max:80',            
            'category'=> 'numeric|min:1',
            'estimated_time_to_complete'=> 'numeric|min:1',
            'note'=> 'required|max:2048',
            ],
            [
                'template_id.min' => 'Please choose a Template.',
                'category.min' => 'Please choose a Category.',
            ]
        );
        $task = new Task_for_template;
        $task->task_template_id = $request->template_id;
        $task->title = $request->title;        
        $task->category = $request->category;
        $task->estimated_time_to_complete = $request->estimated_time_to_complete;        
        $task->note = $request->note;        
        
        $task->save();
        Alert::success('Success', 'You have successfully added Task')->showConfirmButton('Ok','#3085d6')->autoClose(15000);
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
        //dd('edit is hitted');
        $task = Task_for_template::find($id);
        $task_templates = Task_template::all();
        return view('task_for_templates.edit', compact('task', 'task_templates'));
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
        $this->validate($request, [
            'template_id'=> 'numeric|min:1',
            'title'=> 'required|max:80',            
            'category'=> 'numeric|min:1',
            'estimated_time_to_complete'=> 'numeric|min:1',
            'note'=> 'required|max:2048',
            ],
            [
                'template_id.min' => 'Please choose a Template.',
                'category.min' => 'Please choose a Category.',
            ]
        );
        $task = Task_for_template::find($id);
        $task->task_template_id = $request->template_id;
        $task->title = $request->title;        
        $task->category = $request->category;
        $task->estimated_time_to_complete = $request->estimated_time_to_complete;        
        $task->note = $request->note;        
        
        $task->save();
        Alert::success('Success', 'You have successfully updated Task in template')->showConfirmButton('Ok','#3085d6')->autoClose(15000);
        return redirect()->route('task_templates.index')->with('success', 'You have successfully added Task');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task_for_template::find($id);
        $task->delete();
        Alert::success('Success', 'You have successfully deleted Task in template')->showConfirmButton('Ok','#3085d6')->autoClose(15000);
        return redirect()->route('task_templates.index')->with('success', 'You have successfully deleted Site');
    }
}
