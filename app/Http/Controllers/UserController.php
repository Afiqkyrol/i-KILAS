<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profileview()
    {
        session_start();

        $nokp = $_SESSION["nokp"];
        $user = \App\Models\User::where('nokp','=',$nokp)->first();

        $name = "dollah";

        return view('user.profileview',compact('user'));
    }

    public function profileedit()
    {
        session_start();
        $nokp = $_SESSION["nokp"];
        $user = \App\Models\User::where('nokp','=',$nokp)->first();


        return view('user.profileedit',compact('user'));
    }

    public function profilesave(Request $request)
    {

        session_start();
        $nokp = $_SESSION["nokp"];
        $user = \App\Models\User::where('nokp','=',$nokp)->first();

        $validatedData = $request->validate([
				
		'no_telefon' => 'required|min:10|max:11|unique:users,no_telefon,'.$user->id,
		'jabatan' => 'required',
		
		]);
        
        $user->no_telefon = $request->input('no_telefon');
        $user->jabatan = strtoupper($request->input('jabatan'));
        $user->save();

        return redirect()->route('profile.view');

    }

    public function jtmsearch()
    {
        session_start();
        return view('user.jtmsearch');
    }

    public function getid(Request $request)
    {

        $validatedData = $request->validate([

            'no_kp'=>'required|max:12|min:12|exists:users,nokp'
            
        ]);


        $nokp = $request->input('no_kp');

        $get_id = \App\Models\User::where('nokp','=',$nokp)->first();

        if($get_id->jabatan == "JABATAN TEKNOLOGI MAKLUMAT")
        {

            $request->session()->flash('useraccess','Invalid No.K/P');
            return redirect()->route('useredit.jtmsearch');

        }else{

            $id = $get_id->id;
        
            return redirect()->route('useredit.userdetails',['id'=> $id]);

        }

        

    }

    public function userdetails(Request $request, $id)
    {

        session_start();
        return view('user.userdetails',['id'=>\App\Models\User::findOrFail($id)]);

    }

    public function edit(Request $request, $id)
    {
        session_start();
        return view('user.edit',['id'=>\App\Models\User::findOrFail($id)]);
    }

    public function save(Request $request, $id)
    {
        $user = \App\Models\User::where('id','=',$id)->first();
        
        $validatedData = $request->validate([

            'nama'=>'required|min:4|unique:users,fullname,'.$user->id,
            'no_kp'=>'required|max:12|min:12|unique:users,nokp,'.$user->id,
            'email'=>'required|email|unique:users,email,'.$user->id,
            'jantina'=>'required'
            
        ]);

        $user->fullname = $request->input('nama');
        $user->nokp = $request->input('no_kp');
        $user->email = $request->input('email');
        $user->jantina = $request->input('jantina');

        $pengguna = $request->input('pengguna');
        

        if($pengguna == "penyemak")
        {
            $user->jawatan = "penyelia";
            $user->save();

        }else if($pengguna == "pengesah")
        {
            $user->jawatan = "pengarah";
            $user->save();

        }else if($pengguna == "pemohon")
        {
            $user->jawatan = "lain-lain";
            $user->save();
        }

        return redirect()->route('useredit.userdetails',['id'=> $id]);

    }

    public function delete($id)
    {
        $user = \App\Models\User::where('id','=',$id)->delete();

        return redirect()->route('useredit.jtmsearch');
    }
}
