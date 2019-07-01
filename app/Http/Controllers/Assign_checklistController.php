<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Checklist;
use App\Checklist_item;
use App\Checklist_for_template;
use App\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class Assign_checklistController extends Controller
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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'checklist_id'=> 'numeric|min:1',
            'assignee'=> 'numeric|min:1',
        ));
        $checklist = Checklist::find($request->checklist_id);
        $checklist->assignee = $request->assignee;
        $checklist->save();

        
        //Mail::to($user1['email'])->send(new Task_assigned($user1, $task));

        Alert::success('Success', 'You have assigned Checklist to user')->showConfirmButton('Ok','#3085d6')->autoClose(15000);
        return redirect()->back()->with('success','You have assigned task to user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //dd(request()->all());
        $this->validate($request, [            
            'template'=> 'numeric|min:1',
            'duedate'=> 'required|date_format:Y-m-d',
            ],
            [
                'template.min' => 'Please choose a template.',
            ]
        );
        
        $templates = Checklist_for_template::where('template_id', $request->template)->get();
        //dd($template);
        //$id1 = Auth::id();
        $checklist = Checklist::find($id);

        foreach ($templates as $key => $value) 
        {
            $item = new Checklist_item;
            $item->title = $value->title;
            $item->duedate = $request->duedate;
            $item->checklist_id = $id;
            $item->assignee = $checklist->assignee;
            $item->status = 0;
            $item->star = 0;
            $item->save();
        }

        Alert::success('Success', 'You have successfully added items to Checklist from the template')->showConfirmButton('Ok','#3085d6')->autoClose(15000);
        return redirect()->route('checklists.show', $id);
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
