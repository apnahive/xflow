<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\User;
use App\work_order;
use App\work_order_hour;
use App\work_order_assigned;

class WorkOrderController extends Controller
{
    //
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

        $work_orders = work_order::where('user_id', $id1)->get();
        
        //dd($work_orders);
        return view('work_orders.index', compact('work_orders', 'users'));
    }
    public function sort($feild, $type)
    {
        $id1 = Auth::id();
        //$users = User::where('verified', 1)->where('id', '<>', 1)->get();        
        $useradmin = User::role('Admin')->select('id')->get();        
        $users = User::where('verified', 1)->whereNotIn('id', $useradmin)->get();

        $work_orders = work_order::where('user_id', $id1)->orderBy($feild, $type)->get();
        
        //dd($teams);
        return view('work_orders.index', compact('work_orders', 'users'));
    }

    public function create()
    {
         $useradmin = User::role('Admin')->select('id')->get();        
        $users = User::where('verified', 1)->whereNotIn('id', $useradmin)->get();
        return view('work_orders.create', compact('users'));
    }

    public function store(Request $request)
    {
        
       // dd(request()->all());
        $this->validate($request, [            
            'title'=> 'required|max:191',
            ]
        );

        $id1 = Auth::id();

        $work_order = new work_order;
        $work_order->title = $request->title;
        $work_order->description = $request->description;
        $work_order->user_id = $id1;
        $work_order->save();
        Alert::success('Success', 'You have successfully created new Work Order')->showConfirmButton('Ok','#3085d6')->autoClose(15000);
        return redirect()->route('work_orders.index')->with('success', 'You have successfully created Work Order');
    }

    public function show($id)
    {

    	$work_order = work_order::find($id);

        $users_assigned = work_order_assigned::where('work_order_id', $id)->paginate(15);
        //dd($users_assigned);
        foreach ($users_assigned as $key => $value) {
          	$user = User::find($value->user_id);
            $value->name = $user->name.' '.$user->lastname;
            $work_order_hours = work_order_hour::where('work_order_id', $value->work_order_id)->where('user_id', $value->user_id)->sum('hours');
            $value->hours = $work_order_hours;
            /*$work_order_hours_id = work_order_hour::where('work_order_id', $value->work_order_id)->where('user_id', $value->user_id)->get();
            $value->hours_id = $work_order_hours_id->id;*/
        }
        //dd($work_order);
       // dd($users_assigned);
       return view('work_orders.show', compact('work_order', 'users_assigned')); 
        //return view('task_templates.show', compact('task', 'task_templates'));
     /*   $team = Team::find($id);
        $team_members = Team_member::where('team_id', $id)->get();
        foreach ($team_members as $key => $value) 
 {
            $user = User::find($value->user_id);
            $value->name = $user->name.' '.$user->lastname;
        }*/
        //dd($team_members);
        //return view('work_orders.show'/*, compact('team', 'team_members')*/);
    }


    
    public function edit($id)
    {
        //dd('test');
        $work_order = work_order::find($id);
        //dd($work_order);
        return view('work_orders.edit', compact('work_order'));
    }

   
    public function update(Request $request, $id)
    {
        //dd(request()->all());
        $this->validate($request, [            
            'title'=> 'required|max:191',
            ]
        );

        

        $work_order = work_order::find($id);        
        $work_order->title = $request->title;
        $work_order->description = $request->description;
        $work_order->save();
        Alert::success('Success', 'You have successfully updated work order details')->showConfirmButton('Ok','#3085d6')->autoClose(15000);
        return redirect()->route('work_orders.index')->with('success', 'You have successfully updated work order details');
    }
}
