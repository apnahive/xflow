<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task_template;
use App\Task_for_template;

class Task_templateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task_template::all();
        return view('task_templates.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('task_templates.create');
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
            'name'=> 'required|max:20',            
            'detail'=> 'required|max:191',
        ));
        $task = new Task_template;        
        $task->name = $request->name;
        $task->detail = $request->detail;
        $task->save();
        return redirect()->route('task_templates.index')->with('success', 'You have successfully created Template');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task_template::find($id);
        $task_templates = Task_for_template::where('task_template_id', $id)->get();
        foreach ($task_templates as $key => $value) {
            if($value->category == 1)
            {
                $value->category1 = 'Simple';
            }
            elseif($value->category == 2)
            {
                $value->category1 = 'Average';
            }
            elseif($value->category == 3)
            {
                $value->category1 = 'Difficult';
            }
            else
            {
                $value->category1 = 'no category';
            }
        }
        
        return view('task_templates.show', compact('task', 'task_templates'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task_template::find($id);
        return view('task_templates.edit', compact('task'));
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
            'name'=> 'required|max:20',            
            'detail'=> 'required|max:191',
        ));
        $task = Task_template::find($id);
        $task->name = $request->name;
        $task->detail = $request->detail;
        $task->save();
        return redirect()->route('task_templates.index')->with('success', 'You have successfully created Template');
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
