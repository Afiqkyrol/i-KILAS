<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
   
    public function index()
    {
        session_start();
        session_destroy();
        return view('login.index');
    }

    
    public function process(Request $request)
    {
         
         $request->validate([
            'no_kp' => 'required',
            'password' => 'required'
        ]);
	
		$nokp = $request->input('no_kp');
		$password = $request->input('password');
		
		$user = \App\Models\User::where('nokp','=',$nokp)->where('password','=',$password);
        $usercheck = $user->get();


        if($usercheck->isEmpty())
        {

            $request->session()->flash('login','No.K/P and Password doesn\'t match!');
            return redirect()->route('login.index');

        }else{

            $getPassword = $user->first();
            $pw =  $getPassword->password;
        

            $getJabatan = \App\Models\User::where('nokp','=',$nokp)->first();
		    $check = $user->get();
        
        
		
		    if($password != $pw){

                $request->session()->flash('login','No.K/P and Password doesn\'t match!');
                return redirect()->route('login.index');
            
            }else{

                $jabatan = $getJabatan->jabatan;
                session_start();
                $_SESSION["nokp"] = $nokp;
                $_SESSION["jabatan"] = $jabatan;
            
                return redirect()->route('dashboard.dashboard');

            }

        }



        
    }

    public function logout(){

    session_start();
    session_destroy();

    return redirect()->route('login.index');


    }

    public function forgotPass()
    {
        return view('forgot-password.forgotpass');
    }

    public function forgotPassProcess(Request $request)
    {

        $validatedData = $request->validate([
		
		'no_kp' => 'required|max:12|min:12|exists:users,nokp',
		
		]);

        $nokp = $request->input('no_kp');

        $getEmail = \App\Models\User::where('nokp','=',$nokp)->first();
        $email = $getEmail->email;

        session_start();
        $_SESSION["fp_email"] = $email;
        $_SESSION["fp_nokp"] = $nokp;


        return redirect()->route('mail.send');

    }

    public function verification()
    {
        session_start();
        return view('forgot-password.verification');
    }

    public function verificationProcess(Request $request)
    {
        $validatedData = $request->validate([
		
		'code' => 'required|max:6|min:6',
		
		]);
        
        session_start();
        $code = $_SESSION["fp_code"];

        if($request->input('code') == $code)
        {
            return redirect()->route('password.reset');
        }else{
            $request->session()->flash('code','Invalid Code');
            return view('forgot-password.verification');
        }
    }

    public function resetPassword()
    {

        return view('forgot-password.resetpass');

        
    }

    public function processPassword(Request $request)
    {
        $validatedData = $request->validate([
		
		'password' => 'required|min:6|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*#?&_]/',
		'password_confirmation' => 'required_with:password|same:password'
		
		]);

        session_start();
        $nokp = $_SESSION["fp_nokp"];

        $user = \App\Models\User::where('nokp','=',$nokp)->first();
        $user->password = $request->input('password_confirmation');
        $user->save();

        $request->session()->flash('fp_status','Password Successfully Changed!');
        return redirect()->route('login.index');

    }

    public function test(){

    session_start();
    return view('test');


    }

    public function example(){

    
    return view('index');


    }
    
}
