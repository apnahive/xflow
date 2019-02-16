<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Team;
use App\Team_member;
use RealRashid\SweetAlert\Facades\Alert;

class TeamController extends Controller
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
        //$users = User::where('verified', 1)->where('id', '<>', 1)->get();        
        $useradmin = User::role('Admin')->select('id')->get();        
        $users = User::where('verified', 1)->whereNotIn('id', $useradmin)->get();

        $teams = Team::where('user_id', $id1)->get();
        
        //dd($teams);
        return view('teams.index', compact('teams', 'users'));
    }

    public function sort($feild, $type)
    {
        $id1 = Auth::id();
        //$users = User::where('verified', 1)->where('id', '<>', 1)->get();        
        $useradmin = User::role('Admin')->select('id')->get();        
        $users = User::where('verified', 1)->whereNotIn('id', $useradmin)->get();

        $teams = Team::where('user_id', $id1)->orderBy($feild, $type)->get();
        
        //dd($teams);
        return view('teams.index', compact('teams', 'users'));
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
        return view('teams.create', compact('users'));
    }

   
    public function store(Request $request)
    {
        
        //dd(request()->all());
        $this->validate($request, [            
            'title'=> 'required|max:191',
            ]
        );

        $id1 = Auth::id();

        $team = new Team;        
        $team->name = $request->title;
        $team->assign = 'nil';
        $team->user_id = $id1;
        $team->save();
        Alert::success('Success', 'You have successfully created new team')->showConfirmButton('Ok','#3085d6')->autoClose(15000);
        return redirect()->route('teams.index')->with('success', 'You have successfully created Team');
    }

   
    public function show($id)
    {
        $team = Team::find($id);
        $team_members = Team_member::where('team_id', $id)->get();
        foreach ($team_members as $key => $value) 
        {
            $user = User::find($value->user_id);
            $value->name = $user->name.' '.$user->lastname;
        }
        //dd($team_members);
        return view('teams.show', compact('team', 'team_members'));
    }

    
    public function edit($id)
    {
        //dd('test');
        $team = Team::find($id);
        return view('teams.edit', compact('team'));
    }

   
    public function update(Request $request, $id)
    {
        //dd(request()->all());
        $this->validate($request, [            
            'title'=> 'required|max:191',
            ]
        );

        

        $team = Team::find($id);        
        $team->name = $request->title;
        $team->save();
        Alert::success('Success', 'You have successfully Updated team')->showConfirmButton('Ok','#3085d6')->autoClose(15000);
        return redirect()->route('teams.index')->with('success', 'You have successfully created Team');
    }

    
    public function destroy(xflow $xflow)
    {
        //
    }
}
