<?php

namespace App\Http\Controllers;

use App\xflow;
use Illuminate\Http\Request;
use App\User;
use App\Team;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use DateTime;

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
        $now = new \DateTime();
        //$users = User::where('verified', 1)->where('id', '<>', 1)->get();        
        $useradmin = User::role('Admin')->select('id')->get();        
        $users = User::where('verified', 1)->whereNotIn('id', $useradmin)->get();

        $xflows = xflow::where('assignee', $id1)->orWhere('user_id', $id1)->get();
        foreach ($xflows as $key => $value) 
        {
            $userx = User::find($value->assignee);
            $value->assignto = $userx->name.' '.$userx->lastname;
            $team = Team::find($value->team_id);
            $value->team = $team->name;
            switch ($value->status) 
            {
                case 0: 
                    $value->statuss = 'Pending';
                    break;
                case 1: 
                    $value->statuss = 'Initiated';
                    break;
                case 2: 
                    $value->statuss = 'In-work';
                    break;
                case 3: 
                    $value->statuss = 'Finishing';
                    break;
                case 4: 
                    $value->statuss = 'Completed';
                    break;
                
                default:
                    # code... pending, initiated, inwork, finishing, complete
                    break;
            }

            //for the timeline
            $date1 = new DateTime($value->startdate);
            $date2 = new DateTime($value->duedate);
            $d = date_diff($now, $date1);
            $d1 = date_diff($date1, $date2);
            $d2 = date_diff($now, $date2);
            //dd($d->days, $d->invert);
            if($d->invert == 0)
            {

                $value->remaining = $d1->days.' days';
            }
            else
            {
                if($d2->invert == 0)
                {
                    $value->remaining = $d2->days.' days';
                }
                else
                    $value->remaining = 'past due date';
            }

       }
        //dd($xflows);
        return view('xflows.index', compact('xflows'));

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
                'assignteam.min' => 'Please choose a Team.',                
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
    public function show($id)
    {
        $xflow = Xflow::find($id);
        $team = Team::find($xflow->team_id);
        $user = User::find($xflow->assignee);

        //dd($xflow);
        return view('xflows.show', compact('user','team', 'xflow'));
    }

    public function status($id)
    {
        $xflow = Xflow::find($id);
        switch ($xflow->status) 
        {
            case 0:
                $xflow->status = 1;       
                break;
            case 1:
                $xflow->status = 2;       
                break;
            case 2:
                $xflow->status = 3;       
                break;
            case 3:
                $xflow->status = 4;       
                break;
            
            default:
                # code...
                break;
        }
        $xflow->save();

        Alert::success('Success', 'You have successfully updated Xflow status')->showConfirmButton('Ok','#3085d6')->autoClose(15000);
        return redirect()->route('xflows.index');
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\xflow  $xflow
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $xflow = Xflow::find($id);
        $teams = Team::all();
        $useradmin = User::role('Admin')->select('id')->get();        
        $users = User::where('verified', 1)->whereNotIn('id', $useradmin)->get();

        //dd($xflow);
        return view('xflows.edit', compact('users','teams', 'xflow'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\xflow  $xflow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
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
                'assignteam.min' => 'Please choose a Team.',
            ]
        );

        //$id1 = Auth::id();

        $xflow = Xflow::find($id);        
        $xflow->title = $request->title;
        $xflow->description = $request->description;
        $xflow->assignee = $request->assign;
        $xflow->team_id = $request->assignteam;
        $xflow->duedate = $request->duedate;
        $xflow->startdate = $request->startdate;  
        //status to be pending, initiated, inwork, finishing, complete      
        //$xflow->status = 0;
        //$xflow->user_id = $id1;
        $xflow->save();
        Alert::success('Success', 'You have successfully updated Xflow')->showConfirmButton('Ok','#3085d6')->autoClose(15000);
        return redirect()->route('xflows.index')->with('success', 'You have successfully created Xflow');
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
