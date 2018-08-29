<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Project;
use App\Task;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        foreach ($projects as $key => $value) {
            $poc = User::find($value->poc);
            $value->pocname = $poc->name;
            $cco = User::find($value->cco);
            $value->cconame = $poc->name;
        }
        //dd($projects);
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('projects.create', compact('users'));
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
            'name'=> 'required|max:20',                        
            'description'=> 'required|max:191',
            'poc'=> 'numeric|min:1',
            'cco'=> 'numeric|min:1',
            'duedate'=> 'required|date'
        ));
        $project = new Project;
        $project->name = $request->name;
        $project->description = $request->description;
        $project->poc = $request->poc;
        $project->cco = $request->cco;
        $project->duedate = $request->duedate;
        $project->save();
        return redirect()->route('projects.index')->with('success', 'You have successfully created Project');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::find($id);
        $poc = User::find($project->poc);
        $project->pocname = $poc->name;
        $cco = User::find($project->cco);
        $project->cconame = $poc->name;

        $tasks = Task::where('project_id', $id)->get();
        foreach ($tasks as $key => $value) {
            $project = Project::find($value->project_id);
            $value->projectname = $project->name;
            if($value->status == 1)
            {
                $value->status1 = 'pending';
            }
            elseif($value->status == 2)
            {
                $value->status1 = 'initiated';
            }
            elseif($value->status == 3)
            {
                $value->status1 = 'completed';
            }
            else
            {
                $value->status1 = 'no status';
            }
        }
        
        return view('projects.show', compact('project', 'tasks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::all();
        $project = Project::find($id);
        return view('projects.edit', compact('users', 'project'));
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
            'name'=> 'required|max:20',                        
            'description'=> 'required|max:191',
            'poc'=> 'numeric|min:1',
            'cco'=> 'numeric|min:1',
            'duedate'=> 'required|date'
        ));
        $project = Project::find($id);
        $project->name = $request->name;
        $project->description = $request->description;
        $project->poc = $request->poc;
        $project->cco = $request->cco;
        $project->duedate = $request->duedate;
        $project->save();
        return redirect()->route('projects.index')->with('success', 'You have successfully updated Project');
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
