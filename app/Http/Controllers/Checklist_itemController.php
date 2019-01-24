<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Checklist;
use App\User;
use App\Checklist_item;
use App\Checklist_item_note;
use App\Checklist_template;
use App\Sublist;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class Checklist_itemController extends Controller
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
        //return view('checklists.create', compact('users'));
    }

    public function add($id)
    {
        return view('checklist_items.create', compact('id'));
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
            'checklist_id'=> 'numeric|min:1',
            'title'=> 'required|max:191',
            'duedate'=> 'required|date',
        ));

        $checklist = Checklist::find($request->checklist_id);

        $item = new Checklist_item;
        $item->title = $request->title;
        $item->duedate = $request->duedate;
        $item->checklist_id = $request->checklist_id;
        $item->assignee = $checklist->assignee;
        $item->status = 0;
        $item->save();

        Alert::success('Success', 'You have successfully created Checklist Item')->showConfirmButton('Ok','#3085d6')->autoClose(15000);
        return redirect()->route('checklists.show', $checklist->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Checklist_item::find($id);
        
        $assignto = User::find($item->assignee);
        
        $item->assignto = $assignto->name.' '.$assignto->lastname;
        
        $sublists = Sublist::where('item_id', $id)->get();

        $notes = Checklist_item_note::where('item_id', $id)->get();

        return view('checklist_items.show', compact('item', 'sublists', 'notes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Checklist_item::find($id);
        return view('checklist_items.edit', compact('item'));
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
        $this->validate($request, array(
            'title'=> 'required|max:191',
            'duedate'=> 'required|date',
        ));

        $item = Checklist_item::find($id);
        $item->title = $request->title;
        $item->duedate = $request->duedate;
        $item->save();

        Alert::success('Success', 'You have successfully updated Checklist Item')->showConfirmButton('Ok','#3085d6')->autoClose(15000);
        return redirect()->route('checklists.show', $item->checklist_id);
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
