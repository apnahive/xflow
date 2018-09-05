<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project_form;
use App\Form_file;
use App\User;
use App\Form_sign;
use App\Project_user;
use Illuminate\Support\Facades\Auth;


class Form_signController extends Controller
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
        Mail::to('dev.sadiquee@gmail.com')->send(new Form_sign(3));
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
        $id1 = Auth::id();
        $form = Project_form::find($id);
        //$access = Project_user::where('project_id', $form->project_id)->where('user_id', $id1)->get();
        //dd($access);
        if(Project_user::where('project_id', $form->project_id)->where('user_id', $id1)->exists())
        {
            return view('form_sign.edit');
        }
        else
        {
            return view('errors.401');   
        }
        
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
        //
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
