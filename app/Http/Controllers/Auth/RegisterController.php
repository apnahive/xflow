<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Jrean\UserVerification\Traits\VerifiesUsers;
use Jrean\UserVerification\Facades\UserVerification;
use Illuminate\Http\Request;
use Mail;
use App\Mail\Approve_user;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;    
    use VerifiesUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest');
        $this->middleware('guest',['except' => ['getVerification', 'getVerificationError']]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'dateofbirth'=> 'required|date_format:Y-m-d|before:today',
            'lastname' => 'required|string|max:255',
            'user_type' => 'required|string|max:255',
            'organization' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'phonenumber' => 'required|string|max:12',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'lastname' => $data['lastname'],
            'user_type' => $data['user_type'],
            'dateofbirth' => $data['dateofbirth'],
            'organization' => $data['organization'],
            'company' => $data['company'],
            'phonenumber' => $data['phonenumber'],            
        ]);
    }
    public function register(Request $request)
    {
        //dd(request()->all());
        if(User::where('email', $request->email)->exists())
        {
            $usercheck = User::where('email', $request->email)->first();
            if($usercheck->verification_token)
            {
                return back()->withAlert('Email is already in use & is pending for admin approval. Please contact admin for more details');
            }
            else
            {
                if($usercheck->verified == 1)
                    return back()->withAlert('Email is already in use. Please use it to login.');
                else
                    return back()->withAlert('Email is already in use & is rejected by admin. Please contact admin for more details');
            }
        }
        

        $this->validator($request->all())->validate();

        $user = $this->create($request->all());
        UserVerification::generate($user);
        Mail::to('dev.sadiquee@gmail.com')->send(new Approve_user($user));
        Mail::to('erg@ginisis.com')->send(new Approve_user($user));
        //UserVerification::send($user, 'Verify Your email');
        return back()->withAlert('Registerd successfully, please wait for admin approval.');
    }
}
