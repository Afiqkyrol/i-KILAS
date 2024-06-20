<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TindakanController extends Controller
{

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    public function tindakanSemakanAduan(Request $request)
    {
        

        session_start();

        if(empty($_SESSION["nokp"])) {

                $request->session()->flash('redirectLogin','You have to Login first!');
                return redirect()->route('login.index');

        }else{

            $id = $request->input('id');

            if($request->input('ulasan_penyelia')!=null){

                $ulasan_penyelia = $request->input('ulasan_penyelia');

            }else{

            $ulasan_penyelia = "-";

            }

            $nokp = $_SESSION["nokp"];

            $user = \App\Models\User::where('nokp','=',$nokp)->first();
            $name = $user->fullname;

            
            $aduan = \App\Models\KemaskiniAduan::where('id','=',$id)->first();
            $aduan->ulasan_penyelia = $ulasan_penyelia;
            

            if($request->input('semakan') == "DISOKONG"){

                
                $aduan->disemak = $name;
                $aduan->save();

            }else{

                
                $aduan->disemak = "Tidak Disokong oleh ".$name;
                $aduan->status = "PERLU DIEDIT";
                $aduan->save();

            }
            
            return redirect()->route('senarai.semakan');
            

        }

        

    }

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function tindakanSemakanLamanWeb(Request $request)
    {

        

        session_start();

        if(empty($_SESSION["nokp"])) {

                $request->session()->flash('redirectLogin','You have to Login first!');
                return redirect()->route('login.index');

        }else{

            $id = $request->input('id');

            if($request->input('ulasan_penyelia')!=null){

                $ulasan_penyelia = $request->input('ulasan_penyelia');

            }else{

                $ulasan_penyelia = "-";

            }

            $nokp = $_SESSION["nokp"];

            $user = \App\Models\User::where('nokp','=',$nokp)->first();
            $name = $user->fullname;

            
            $lamanweb = \App\Models\KemaskiniLamanWeb::where('id','=',$id)->first();
            $lamanweb->ulasan_penyelia = $ulasan_penyelia;
            

            if($request->input('semakan') == "DISOKONG"){

                
                $lamanweb->disemak = $name;
                $lamanweb->save();

            }else{

                
                $lamanweb->disemak = "Tidak Disokong oleh ".$name;
                $lamanweb->status = "PERLU DIEDIT";
                $lamanweb->save();

            }
            
            return redirect()->route('senarai.semakan');
            

        }

    }

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
   
    public function tindakanPengesahanLamanWeb(Request $request)
    {
        

        session_start();

        if(empty($_SESSION["nokp"])) {

                $request->session()->flash('redirectLogin','You have to Login first!');
                return redirect()->route('login.index');

        }else{

            $id = $request->input('id');

            if($request->input('ulasan_pengarah')!=null){

                $ulasan_pengarah = $request->input('ulasan_pengarah');

            }else{

                $ulasan_pengarah = "-";

            }

            $nokp = $_SESSION["nokp"];

            $user = \App\Models\User::where('nokp','=',$nokp)->first();
            $name = $user->fullname;

            
            $lamanweb = \App\Models\KemaskiniLamanWeb::where('id','=',$id)->first();
            $lamanweb->ulasan_pengarah = $ulasan_pengarah;
            

            if($request->input('pengesahan') == "DISOKONG"){

                
                $lamanweb->disahkan = $name;
                $lamanweb->save();

            }else{

                
                $lamanweb->disahkan = "Ditolak oleh ".$name;
                $lamanweb->status = "PERLU DIEDIT";
                $lamanweb->save();

            }
            
            return redirect()->route('senarai.pengesahan');
            

        }
    }

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function tindakanPengesahanAduan(Request $request)
    {
        

        session_start();

        if(empty($_SESSION["nokp"])) {

                $request->session()->flash('redirectLogin','You have to Login first!');
                return redirect()->route('login.index');

        }else{

            $id = $request->input('id');

            if($request->input('ulasan_pengarah')!=null){

                $ulasan_pengarah = $request->input('ulasan_pengarah');

            }else{

                $ulasan_pengarah = "-";

            }

            $nokp = $_SESSION["nokp"];

            $user = \App\Models\User::where('nokp','=',$nokp)->first();
            $name = $user->fullname;

            
            $lamanweb = \App\Models\KemaskiniAduan::where('id','=',$id)->first();
            $lamanweb->ulasan_pengarah = $ulasan_pengarah;
            

            if($request->input('pengesahan') == "DISOKONG"){

                
                $lamanweb->disahkan = $name;
                $lamanweb->save();

            }else{

                
                $lamanweb->disahkan = "Ditolak oleh ".$name;
                $lamanweb->status = "PERLU DIEDIT";
                $lamanweb->save();

            }
            
            return redirect()->route('senarai.pengesahan');
            

        }
    }

    public function tindakanKemaskiniLamanWeb(Request $request)
    {


        

        session_start();

        if(empty($_SESSION["nokp"])) {

                $request->session()->flash('redirectLogin','You have to Login first!');
                return redirect()->route('login.index');

        }else{

            $id = $request->input('id');

            if($request->input('url')!=null){

                $url = $request->input('url');

           }else{

                $url = "";

            }

            $nokp = $_SESSION["nokp"];

            $user = \App\Models\User::where('nokp','=',$nokp)->first();
            $name = $user->fullname;

            
            $lamanweb = \App\Models\KemaskiniLamanWeb::where('id','=',$id)->first();
            $lamanweb->url = $url;
            $lamanweb->dikemaskini = $name;
            $lamanweb->status = "SELESAI";
            $lamanweb->save();
            
            return redirect()->route('senarai.kemaskini');
            

        }


    }

    public function tindakanKemaskiniAduan(Request $request)
    {


        

        session_start();

        if(empty($_SESSION["nokp"])) {

                $request->session()->flash('redirectLogin','You have to Login first!');
                return redirect()->route('login.index');

        }else{

            $id = $request->input('id');

            if($request->input('url')!=null){

                $url = $request->input('url');

            }else{

                $url = "";

            }

            $nokp = $_SESSION["nokp"];

            $user = \App\Models\User::where('nokp','=',$nokp)->first();
            $name = $user->fullname;

            
            $aduan = \App\Models\KemaskiniAduan::where('id','=',$id)->first();
            $aduan->url = $url;
            $aduan->dikemaskini = $name;
            $aduan->status = "SELESAI";
            $aduan->save();
            
            return redirect()->route('senarai.kemaskini');
            

        }


    }
}
