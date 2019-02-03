<?php

namespace App\Http\Controllers;

use App\xflow;
use Illuminate\Http\Request;
use App\User;
use App\Team;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class XflowController extends Controller
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
        //
        $id1 = Auth::id();
        //$users = User::where('verified', 1)->where('id', '<>', 1)->get();        
        $useradmin = User::role('Admin')->select('id')->get();        
        $users = User::where('verified', 1)->whereNotIn('id', $useradmin)->get();

        $xflows = xflow::where('assignee', $id1)->orWhere('user_id', $id1)->get();
        foreach ($xflows as $key => $value) 
        {
            $userx = User::find($value->assignee);
            //dd($userx);
            $value->user = $userx->name;
            /*if(Sublist::where('checklist_id', $value->id)->exists())
                $value->sublist = 1;
            else
                $value->sublist = 0;*/

       }
        //dd($checklists);
        return view('xflows.index', compact('xflows','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $useradmin = User::role('Admin')->select('id')->get();        
        $users = User::where('verified', 1)->whereNotIn('id', $useradmin)->get();
        $teams = Team::all();
        return view('xflows.create', compact('users','teams'));
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
        //dd(request()->all());
        $this->validate($request, [            
            'title'=> 'required|max:191',
            'description'=> 'required|max:191',
            'duedate'=> 'required|date',
            'startdate'=> 'required|date',
            'assign'=> 'numeric|min:1',
            'assign-team'=> 'numeric|min:1',             
            ],
            [
                'assign.min' => 'Please choose a user.',                
            ]
        );

        $id1 = Auth::id();

        $xflow = new Xflow;        
        $xflow->title = $request->title;
        $xflow->description = $request->description;
        $xflow->assignee = $request->assign;
        $xflow->team_id = $request->assignteam;
        $xflow->duedate = $request->duedate;
        $xflow->startdate = $request->startdate;  
        //status to be pending, initiated, inwork, finishing, complete      
        $xflow->status = 0;
        $xflow->user_id = $id1;
        $xflow->save();
        Alert::success('Success', 'You have successfully created Xflow')->showConfirmButton('Ok','#3085d6')->autoClose(15000);
        return redirect()->route('xflows.index')->with('success', 'You have successfully created Xflow');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\xflow  $xflow
     * @return \Illuminate\Http\Response
     */
    public function show(xflow $xflow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\xflow  $xflow
     * @return \Illuminate\Http\Response
     */
    public function edit(xflow $xflow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\xflow  $xflow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, xflow $xflow)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\xflow  $xflow
     * @return \Illuminate\Http\Response
     */
    public function destroy(xflow $xflow)
    {
        //
    }
}
