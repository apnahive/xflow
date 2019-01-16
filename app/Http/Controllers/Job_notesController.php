<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interview_schedule;
use App\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;


class Job_notesController extends Controller
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
        //
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
        //dd('edit is hitted');
        $ids = explode('-', $id);
        //dd($ids);
        // $ids[0] is job_id and $ids[1] is user_id
        $notes = Interview_schedule::where('job_id', $ids[0])->where('candidate_id', $ids[1])->where('active', 1)->first();
        //dd($notes);
        if($notes->finallized)
            $note = $notes->note_finallized;
        elseif ($notes->interviewed)
            $note = $notes->note_interviewed;
        elseif ($notes->scheduled)
            $note = $notes->note_scheduled;

        if (Auth::user()->hasPermissionTo('can create job'))
            return view('notes.edit', compact('notes', 'note'));
        else
            return view('errors.401');
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
            'note'=> 'required|max:2048',
        ));
        $ids = explode('-', $id);
        //dd($ids);
        // $ids[0] is job_id and $ids[1] is user_id
        $notes = Interview_schedule::where('job_id', $ids[0])->where('candidate_id', $ids[1])->where('active', 1)->first();
        //dd($notes);
        if($notes->finallized)
        {
            $notes->note_finallized = $request->note;
        }
        elseif ($notes->interviewed)
        {
            $notes->note_interviewed = $request->note;
        }
        elseif ($notes->scheduled)
        {
            $notes->note_scheduled = $request->note;
        }
        $notes->save();

        Alert::success('Success', 'You have successfully Added note to the candidate')->showConfirmButton('Ok','#3085d6')->autoClose(15000);
        return redirect()->route('jobs.show', $ids[0]);
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
