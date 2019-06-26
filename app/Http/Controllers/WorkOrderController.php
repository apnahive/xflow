<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\User;
use App\work_order;
use App\work_order_hour;
use App\work_order_assigned;
use DateTime;

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

    public function report($id)
    {
        $work_order = work_order::find($id);
        return view('work_orders.report', compact('work_order')); 
    }
    public function report_download(Request $request)
    {        
       //dd(request()->all());
        $this->validate($request, [            
            'from_date'=> 'required|date|before:to_date',
            'to_date'=> 'required|date|after:from_date'
            ]
        );
        $work_order = work_order::find($request->work_order_id);
        $users_assigned = work_order_assigned::where('work_order_id', $request->work_order_id)->get();
        $data[] = null;
        $row1[0] = 'Date';
        $total[0] = 'Total';
        foreach ($users_assigned as $key => $value) 
        {
            $user = User::find($value->user_id);
            $row1[$key+1] = $user->name.' '.$user->lastname;
            $total[$key+1] = 0;
        }
        //dd($row1);
        $begin = new DateTime($request->from_date);
        $end   = new DateTime($request->to_date);
        $i = 0;
        //$total[] = null;
        while ($begin <= $end) 
        {
            
            $rowsheet[0] = $begin->format("Y-m-d");
            foreach ($users_assigned as $key => $value) 
            {
                $work_order_hours = work_order_hour::where('work_order_id','=',$request->work_order_id)->whereDate('date', $begin)->where('user_id', $value->user_id)->where('status', 1)->first();
                if($work_order_hours)
                {
                    $rowsheet[$key+1] = $work_order_hours->hours;
                    $total[$key+1] = $total[$key+1] + $work_order_hours->hours;
                }
                else
                    $rowsheet[$key+1] = '';
            }
            $data[$i] = $rowsheet;
            $begin->modify('+1 day');
            $i++;
        }
        $last1 = '';
        $rowlast[0] = 'Total';
        foreach ($users_assigned as $key => $value) 
        {
            $rowlast[$key+1] = $total[$key+1];
        }
        /*for($i = $begin; $i <= $end; $i->modify('+1 day')){
            $data[$i] = $i->format("Y-m-d");
        }*/
        //dd($data);
        return \Excel::create('Work_order_report', function($excel) use ($data, $row1, $rowlast, $last1) {            
            $excel->sheet('sheet name', function($sheet) use ($data, $row1, $rowlast, $last1)
            {
                $sheet->row(1, $row1);
                $sheet->fromArray($data, null, 'A2', false, false);
                $sheet->appendRow($last1);
                $sheet->appendRow($rowlast);
            });
        })->download('xls');

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
