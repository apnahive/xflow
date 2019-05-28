<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\work_order_hour;
use App\work_order_assigned;
use App\User;
use App\work_order;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class WorkOrderHourController extends Controller
{
    //
     public function store(Request $request)
    {
        
        //dd(request()->all());
        $this->validate($request, [
        	'work_order' => 'numeric|min:1',           
            'date'=> 'required|date',
            'hours'=> 'required|numeric|min:1',
            ],
            [
                'work_order.min' => 'Please choose a work order.',                
            ]
        );

        $id1 = Auth::id();

        $work_order_hour = new work_order_hour;
        $work_order_hour->user_id = $id1;
        $work_order_hour->work_order_id = $request->work_order;
        $work_order_hour->date = $request->date;
        $work_order_hour->hours = $request->hours;
        $work_order_hour->save();
        Alert::success('Success', 'You have successfully added hours to your Work Order')->showConfirmButton('Ok','#3085d6')->autoClose(15000);
        return redirect()->route('work_order_assign.index')->with('success', 'You have successfully added hours to Work Order');
    }
    public function update(Request $request, $id)
    {
        //dd(request()->all());
        $this->validate($request, [            
            'hours'=> 'required|numeric|min:1',
            ]
        );

        

        $work_order = work_order_hour::find($id);        
        $work_order->hours = $request->hours;
        $work_order->save();
        Alert::success('Success', 'You have successfully updated work order details')->showConfirmButton('Ok','#3085d6')->autoClose(15000);
        return redirect()->route('work_order_assign.show', $work_order->work_order_id)->with('success', 'You have successfully updated work order details');
    }

    public function search(Request $request)
    {
        //dd(request()->all());
        $start = $request->from_date;
    	$end = $request->to_date;
    	$work_order_id =$request->work_order_id;

    $work_order_hours = work_order_hour::where('work_order_id','=',$request->work_order_id)->whereBetween('date', array($start, $end))->get();
    //dd($work_order_hours);
    //return response()->json($dates);
        return view('work_order_assign.search', compact('work_order_hours', 'work_order_id'));
    }
}
