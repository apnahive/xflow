<?php

namespace App\Http\Controllers;

use App\work_order_assigned;
use Illuminate\Http\Request;
use App\User;
use App\work_order;
use RealRashid\SweetAlert\Facades\Alert;

class WorkOrderAssignedController extends Controller
{
    
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
}
