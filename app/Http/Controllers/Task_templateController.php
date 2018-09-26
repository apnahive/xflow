<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task_template;
use App\Task_for_template;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class Task_templateController extends Controller
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

    public function index()
    {
        $id1 = Auth::id();
        if($id1 == 1)
        {
            $tasks = Task_template::paginate(15);
            return view('task_templates.index', compact('tasks'));    
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
        $id1 = Auth::id();
        if($id1 == 1)
        {
            return view('task_templates.create');
        }
        else
        {
            return view('errors.401');
        }        
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
            'name'=> 'required|max:80',            
            'detail'=> 'required|max:191',
        ));
        $task = new Task_template;        
        $task->name = $request->name;
        $task->detail = $request->detail;
        $task->save();
        Alert::success('Success', 'You have successfully created Template')->showConfirmButton('Ok','#3085d6')->autoClose(15000);
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
        $task_templates = Task_for_template::where('task_template_id', $id)->paginate(15);
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
        $id1 = Auth::id();
        if($id1 == 1)
        {
            $task = Task_template::find($id);
            return view('task_templates.edit', compact('task'));
        }
        else
        {
            return view('errors.401');
        }
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
            'name'=> 'required|max:80',            
            'detail'=> 'required|max:191',
        ));
        $task = Task_template::find($id);
        $task->name = $request->name;
        $task->detail = $request->detail;
        $task->save();
        Alert::success('Success', 'You have successfully updated Template')->showConfirmButton('Ok','#3085d6')->autoClose(15000);
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
        //dd('delete has been hitted');
        $task = Task_template::find($id);
        $task_templates = Task_for_template::where('task_template_id', $id);
        $task->delete();
        $task_templates->delete();
        Alert::success('Success', 'You have successfully deleted Task template')->showConfirmButton('Ok','#3085d6')->autoClose(15000);
        return redirect()->route('task_templates.index')->with('success', 'You have successfully deleted Site');
    }
}
