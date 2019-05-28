<?php

namespace App\Http\Controllers;

use App\work_order_assigned;
use App\work_order_hour;
use Illuminate\Http\Request;
use App\User;
use App\work_order;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class WorkOrderAssignedController extends Controller
{
    public function index()
    {
        $id1 = Auth::id();
        //$users = User::where('verified', 1)->where('id', '<>', 1)->get();        
        $useradmin = User::role('Admin')->select('id')->get();        
        $users = User::where('verified', 1)->whereNotIn('id', $useradmin)->get();

        $work_orders = work_order_assigned::where('user_id', $id1)->get();
        //dd($work_orders);
        
           
        foreach ($work_orders as $key => $value) 
        {
            //dd($value);
            
            $work_order_hours = work_order_hour::where('work_order_id', $value->work_order_id)->sum('hours');
            $work_order_name = work_order::find($value->work_order_id);
            //dd($work_order_name);
            $value->title = $work_order_name->title;
            if($work_order_hours === null){
                $value->hours = '02';    
            }
                   $value->hours = $work_order_hours;
            /*if(Sublist::where('checklist_id', $value->id)->exists())
                $value->sublist = 1;
            else
                $value->sublist = 0;*/

        }
        //dd($work_order_details);
        //dd($work_orders);

        return view('work_order_assign.index', compact('work_orders', 'users'));
    }

    public function assign($id)
    {
        //
        $work_order = work_order::find($id);
        $work_order_assigned = work_order_assigned::where('work_order_id', $id)->select('user_id')->get();
        $users = User::where('verified', 1)->whereNotIn('id', $work_order_assigned)->get();  //samar- to remove selected users.
        
        $selected_users = User::whereIn('id', $work_order_assigned)->get();
        return view('work_orders.assign', compact('work_order','users','selected_users'));
    }

    public function update(Request $request, $id)
    {
        //dd(request()->all());
        $work_order = work_order::find($id);
        $users = $request->users;
        $no_users = $request->no_user;
       // dd($no_users);
        if($users)
        {
            foreach ($users as $key => $value) 
            {
                if(work_order_assigned::where('user_id', '=', $value)->where('work_order_id', '=', $work_order->id)->exists())
                {

                }
                else
                {
                    $work_order_assigned = new work_order_assigned;
                    $work_order_assigned->work_order_id = $work_order->id;
                    $work_order_assigned->user_id = $value;
                   
                    $work_order_assigned->save();    
                }
                
            }
        }
        if($no_users)
        {
            //dd($no_users);
            foreach ($no_users as $no_key => $no_value) 
            {
                if(work_order_assigned::where('user_id', '=', $no_value)->where('work_order_id', '=', $work_order->id)->exists())
                {
                    $work_order_assigned = work_order_assigned::where('user_id', '=', $no_value)->where('work_order_id', '=', $work_order->id);
                    $work_order_assigned->delete();
                }
                else
                {
                    
                }
            }
        }
        Alert::success('Success', 'You have successfully assigned users to work order')->showConfirmButton('Ok','#3085d6')->autoClose(15000);
        return redirect()->route('work_orders.show', $id);

    }
     public function show($id)
    {
       // dd($id);
        $id1 = Auth::id();
        $work_order = work_order::find($id);
        $work_order_hours = work_order_hour::where('work_order_id', $id)->where('user_id', $id1)->orderBy('date', 'desc')->paginate(15);
        $users_assigned = work_order_assigned::where('work_order_id', $id)->paginate(15);
        
        foreach ($users_assigned as $key => $value) {
            $user = User::find($value->user_id);
            $value->name = $user->name.' '.$user->lastname;
        }
        //dd($work_order_hours);
       return view('work_order_assign.show', compact('work_order_hours', 'work_order')); 
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
        $work_order_hours = work_order_hour::find($id);
        //dd($work_order_hours);
        return view('work_order_assign.edit', compact('work_order_hours'));
    }
    
}
