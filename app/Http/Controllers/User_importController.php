<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use Hash;
use App\User;
use DateTime;
use RealRashid\SweetAlert\Facades\Alert;

class User_importController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('userupload');
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
        // dd('test');
        $request->validate([
            'user_file' => 'required'
        ]);
 
        $path = $request->file('user_file')->getRealPath();
        $data = Excel::load($path)->get();
        //dd($data);
        if($data->count()){
            $now = new DateTime();
            foreach ($data as $key => $value) {

                if($value->dateofbirth)
                    $value->dateofbirth = new DateTime($value->dateofbirth);
                else
                    $value->dateofbirth = new DateTime('1991-01-01');

                $arr[] = ['name' => $value->name, 'lastname' => $value->lastname, 'email' => $value->email, 'password' => Hash::make('password'), 'user_type' => $value->user_type, 'dateofbirth' => $value->dateofbirth, 'organization' => $value->organization, 'company' => $value->company, 'phonenumber' => $value->phonenumber, 'verified' => 1, 'created_at' => $now, 'updated_at' => $now ];
            }
 
            if(!empty($arr)){
                User::insert($arr);
            }
        }
        Alert::success('Success', 'You have successfully Uploaded Users')->showConfirmButton('Ok','#3085d6')->autoClose(15000);
        return redirect()->route('home');
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
