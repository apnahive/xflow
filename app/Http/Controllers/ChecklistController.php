<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Checklist;
use RealRashid\SweetAlert\Facades\Alert;

class ChecklistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();        
        $checklists = Checklist::all();
        foreach ($checklists as $key => $value) 
        {
            $userx = User::find($value->assignee);
            //dd($userx);
            $value->user = $userx->name;

        }
        //dd($checklists);
        return view('checklists.index', compact('checklists', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('checklists.create', compact('users'));
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
            'title'=> 'required|max:20',            
            'assign'=> 'numeric|min:1',            
        ));
        $checklist = new Checklist;        
        $checklist->title = $request->title;
        $checklist->assignee = $request->assign;        
        $checklist->status = 0;
        $checklist->save();
        Alert::success('Success', 'You have successfully created Checklist')->showConfirmButton('Ok','#3085d6')->autoClose(15000);
        return redirect()->route('checklists.index')->with('success', 'You have successfully created Task');
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
        $users = User::all();
        $checklist = Checklist::find($id);
        return view('checklists.edit', compact('checklist', 'users'));
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
            'title'=> 'required|max:20',            
            'assign'=> 'numeric|min:1',            
        ));
        $checklist = Checklist::find($id);
        $checklist->title = $request->title;
        $checklist->assignee = $request->assign;        
        $checklist->status = 0;
        $checklist->save();
        Alert::success('Success', 'You have successfully updated Checklist')->showConfirmButton('Ok','#3085d6')->autoClose(15000);
        return redirect()->route('checklists.index')->with('success', 'You have successfully created Task');
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
