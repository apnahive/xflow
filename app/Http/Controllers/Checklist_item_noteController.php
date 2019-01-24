<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Checklist_item;
use App\Checklist_item_note;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class Checklist_item_noteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        //dd('add is hitted');
        return view('checklist_item_notes.create', compact('id'));
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
            'note'=> 'required|max:2048',
        ));
        $notes = new Checklist_item_note;
        $notes->note = $request->note;
        $notes->item_id = $request->item_id;
        $notes->save();

        
        //Mail::to($user1['email'])->send(new Task_assigned($user1, $task));

        Alert::success('Success', 'You have added note to checklist item')->showConfirmButton('Ok','#3085d6')->autoClose(15000);
        return redirect()->route('checklist_items.show', $request->item_id);
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
        $note = Checklist_item_note::find($id);
        return view('checklist_item_notes.edit', compact('note'));
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
            'note'=> 'required|max:2048',
        ));
        $notes = Checklist_item_note::find($id);
        $notes->note = $request->note;
        $notes->save();

        
        //Mail::to($user1['email'])->send(new Task_assigned($user1, $task));

        Alert::success('Success', 'You have sucessfully updated Notes')->showConfirmButton('Ok','#3085d6')->autoClose(15000);
        return redirect()->route('checklist_items.show', $notes->item_id);
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
