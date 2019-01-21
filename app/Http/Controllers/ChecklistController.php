<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Checklist;
use App\Checklist_template;
use App\Sublist;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class ChecklistController extends Controller
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
        //$users = User::where('verified', 1)->where('id', '<>', 1)->get();        
        $useradmin = User::role('Admin')->select('id')->get();        
        $users = User::where('verified', 1)->whereNotIn('id', $useradmin)->get();

        $checklists = Checklist::all();
        foreach ($checklists as $key => $value) 
        {
            $userx = User::find($value->assignee);
            //dd($userx);
            $value->user = $userx->name;
            if(Sublist::where('checklist_id', $value->id)->exists())
                $value->sublist = 1;
            else
                $value->sublist = 0;

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
        //$users = User::where('verified', 1)->where('id', '<>', 1)->get();
        $useradmin = User::role('Admin')->select('id')->get();        
        $users = User::where('verified', 1)->whereNotIn('id', $useradmin)->get();
        return view('checklists.create', compact('users'));
    }
    public function add()
    {        
        //$users = User::where('verified', 1)->where('id', '<>', 1)->get();
        $useradmin = User::role('Admin')->select('id')->get();        
        $users = User::where('verified', 1)->whereNotIn('id', $useradmin)->get();
        $templates = Checklist_template::all();
        return view('checklists.add', compact('users', 'templates'));
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
            'title'=> 'required|max:191',
            'duedate'=> 'required|date',
            'assign'=> 'numeric|min:1',            
            ],
            [
                'assign.min' => 'Please choose a user.',                
            ]
        );

        $id1 = Auth::id();

        $checklist = new Checklist;        
        $checklist->title = $request->title;
        $checklist->assignee = $request->assign;
        $checklist->duedate = $request->duedate;        
        $checklist->status = 0;
        $checklist->user_id = $id1;
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
        $checklist = Checklist::find($id);
        $assignto = User::find($checklist->assignee);
        $createdby = User::find($checklist->user_id);
        $checklist->assignto = $assignto->name.' '.$assignto->lastname;
        $checklist->createdby = $createdby->name.' '.$createdby->lastname;
        //dd($checklist);
        $sublists = Sublist::where('checklist_id', $id)->get();
        
        return view('checklists.show', compact('checklist', 'sublists'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$users = User::where('verified', 1)->where('id', '<>', 1)->get();
        $useradmin = User::role('Admin')->select('id')->get();        
        $users = User::where('verified', 1)->whereNotIn('id', $useradmin)->get();
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
        $this->validate($request, [            
            'title'=> 'required|max:191',
            'duedate'=> 'required|date',            
            'assign'=> 'numeric|min:1',            
            ],
            [
                'assign.min' => 'Please choose a user.',                
            ]
        );        
        $checklist = Checklist::find($id);
        $checklist->title = $request->title;
        $checklist->assignee = $request->assign;
        $checklist->duedate = $request->duedate;        
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
