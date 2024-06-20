<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    
    public function index()
    {
        return view('register.index');
    }

    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
				
		'fullname' => 'required|min:4|unique:users,fullname',
		'no_kp' => 'required|max:12|min:12|unique:users,nokp',
        'no_telefon' => 'required|max:11|min:10|unique:users,no_telefon',
        'jantina' => 'required',
		'email' => 'required|email|unique:users,email',
		'jabatan' => 'required',
		'password' => 'required|min:6|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*#?&_]/',
		'password_confirmation' => 'required_with:password|same:password'
		]);
		
		$User = new \App\Models\User;
        $User->fullname = strtoupper($request->input('fullname'));
		$User->nokp = $request->input('no_kp');
        $User->no_telefon = $request->input('no_telefon');
        $User->jantina = $request->input('jantina');
		$User->email = $request->input('email');
		$User->jabatan = strtoupper($request->input('jabatan'));
        $User->jawatan = "lain-lain";
		$User->password = $request->input('password_confirmation');
		$User->save();
		
		$request->session()->flash('status','Successfully registered!');
		
		return redirect()->route('login.index');
    }

    
}
