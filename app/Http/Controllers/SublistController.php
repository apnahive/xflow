<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sublist;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class SublistController extends Controller
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

    public function add($id)
    {
        return view('sublists.create', compact('id'));
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
        $this->validate($request, array(            
            'title'=> 'required|max:191',
        ));
        $sublist = new Sublist;
        $sublist->title = $request->title;
        $sublist->checklist_id = $request->checklist_id;
        $sublist->status = 0;
        $sublist->save();

        
        //Mail::to($user1['email'])->send(new Task_assigned($user1, $task));

        Alert::success('Success', 'You have added sublist to checklist')->showConfirmButton('Ok','#3085d6')->autoClose(15000);
        return redirect()->route('checklists.show', $request->checklist_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sublist = Sublist::find($id);
        return view('sublists.edit', compact('sublist'));
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
        $this->validate($request, array(            
            'title'=> 'required|max:191',
        ));
        $sublist = Sublist::find($id);
        $sublist->title = $request->title;
        $sublist->save();

        
        //Mail::to($user1['email'])->send(new Task_assigned($user1, $task));

        Alert::success('Success', 'You have sucessfully updated sublist')->showConfirmButton('Ok','#3085d6')->autoClose(15000);
        return redirect()->route('checklists.show', $sublist->checklist_id);
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
