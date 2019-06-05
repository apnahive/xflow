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
            'date'=> 'required|date_format:Y-m-d',
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

    public function showhours($work_order_id, $user_id)
    {
        //dd($work_order_id);
    $id1 = Auth::id();
            //dd($id1);
            $work_order = work_order::find($work_order_id);
            $work_order_hours = work_order_hour::where('work_order_id', $work_order_id)->where('user_id', $user_id)->orderBy('date', 'desc')->paginate(15);
            $users_assigned = work_order_assigned::where('work_order_id', $work_order_id)->paginate(15);
            
            foreach ($work_order_hours as $key => $value) {
                if ($value->status === 1)
                {
                    $value->statusis = 'Approved';
                }
                elseif ($value->status === 2){
                    $value->statusis = 'Rejected';
                } 
                else{
                    $value->statusis = 'Pending';
                }
                if($value->comment){
                    $value->commentis = 1;   
                }
                else{
                    $value->commentis = 0;      
                }

                $user = User::find($value->user_id);
                $value->name = $user->name.' '.$user->lastname;
              }
            //dd($work_order_hours);
           return view('work_order_assign.show', compact('work_order_hours', 'work_order')); 
       
    }
    public function show($id)
    {
        //dd($request);

        $work_order = work_order::find($id);

        $users_assigned = work_order_assigned::where('work_order_id', $id)->paginate(15);
        dd($users_assigned);
        foreach ($users_assigned as $key => $value) {
            $user = User::find($value->user_id);
            $value->name = $user->name.' '.$user->lastname;
            $work_order_hours = work_order_hour::where('work_order_id', $value->work_order_id)->where('user_id', $value->user_id)->sum('hours');
            $value->hours = $work_order_hours;
        }
        dd($users_assigned);
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

    public function approve($id)
    {
        //dd($id);
        $work_order = work_order_hour::find($id);
        $work_order->status = 1;
        $work_order->save();
        Alert::success('Success', 'You have successfully Approved Hours')->showConfirmButton('Ok','#3085d6')->autoClose(15000);
        return redirect()->route('work_order_hour.showhours', [$work_order->work_order_id, $work_order->user_id]);
       
    }

    public function reject($id)
    {
        //dd($id);
         $work_order = work_order_hour::find($id);
        $work_order->status = 2;
        $work_order->save();
        Alert::success('Success', 'You have successfully Rejected Hours')->showConfirmButton('Ok','#3085d6')->autoClose(15000);
        return redirect()->route('work_order_hour.showhours', [$work_order->work_order_id, $work_order->user_id]);
       
    }

    public function comment(Request $request)
    {
        //dd($id);
        //dd(request()->all());
        $work_order = work_order_hour::find($request->hour_id);
        $work_order->comment = $request->description;
        $work_order->save();
        Alert::success('Success', 'You have successfully added comment to Hours')->showConfirmButton('Ok','#3085d6')->autoClose(15000);
        return redirect()->route('work_order_hour.showhours', [$work_order->work_order_id, $work_order->user_id]);
       
    }

    public function destroy($id)
    {
        //
    }
}
