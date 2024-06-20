<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
     public function index(Request $request)
    {
        session_start();
        $_SESSION['kategori_saluran']="";
        $_SESSION['jenis_kemaskini']="";
        $_SESSION['kategori_maklumat']="";
        $_SESSION['dari'] = "";
        $_SESSION['sehingga'] = "";
        $_SESSION['status'] = "";
        $_SESSION['fjabatan'] = "";
        $_SESSION['jenis_permohonan'] = "lamanweb";

            if(empty($_SESSION["nokp"])) {

                $request->session()->flash('redirectLogin','You have to Login first!');
                return redirect()->route('login.index');
                //abort(404);

            }else{
                
                $nokp = $_SESSION["nokp"];
                $user = \App\Models\User::where('nokp','=',$nokp)->first();

                if($user->jabatan != "JABATAN TEKNOLOGI MAKLUMAT")
                {

                    $lamanweb = \App\Models\KemaskiniLamanWeb::where('nokp','=',$nokp)->get();
                    $lamanweb_diproses = \App\Models\KemaskiniLamanWeb::where('nokp','=',$nokp)->where('status','=','DIPROSES')->get();
                    $lamanweb_selesai = \App\Models\KemaskiniLamanWeb::where('nokp','=',$nokp)->where('status','=','SELESAI')->get();
                    $lamanweb_ditolak = \App\Models\KemaskiniLamanWeb::where('nokp','=',$nokp)->where('status','=','PERLU DIEDIT')->get();

                    $aduan = \App\Models\KemaskiniAduan::where('nokp','=',$nokp)->get();
                    $aduan_diproses = \App\Models\KemaskiniAduan::where('nokp','=',$nokp)->where('status','=','DIPROSES')->get();
                    $aduan_selesai = \App\Models\KemaskiniAduan::where('nokp','=',$nokp)->where('status','=','SELESAI')->get();
                    $aduan_ditolak = \App\Models\KemaskiniAduan::where('nokp','=',$nokp)->where('status','=','PERLU DIEDIT')->get();

                    $permohonan_num = 0;
                    $permohonan_diproses_num = 0;
                    $permohonan_selesai_num = 0;
                    $permohonan_ditolak_num = 0;

                }else{

                    $lamanweb = \App\Models\KemaskiniLamanWeb::get();
                    $lamanweb_diproses = \App\Models\KemaskiniLamanWeb::where('status','=','DIPROSES')->get();
                    $lamanweb_selesai = \App\Models\KemaskiniLamanWeb::where('status','=','SELESAI')->get();
                    $lamanweb_ditolak = \App\Models\KemaskiniLamanWeb::where('status','=','PERLU DIEDIT')->get();

                    $aduan = \App\Models\KemaskiniAduan::get();
                    $aduan_diproses = \App\Models\KemaskiniAduan::where('status','=','DIPROSES')->get();
                    $aduan_selesai = \App\Models\KemaskiniAduan::where('status','=','SELESAI')->get();
                    $aduan_ditolak = \App\Models\KemaskiniAduan::where('status','=','PERLU DIEDIT')->get();

                    $permohonan_num = 0;
                    $permohonan_diproses_num = 0;
                    $permohonan_selesai_num = 0;
                    $permohonan_ditolak_num = 0;

                }

                foreach ($lamanweb as $lamanweb_data)
                {
                    $permohonan_num++;
                }
                foreach ($aduan as $aduan_data)
                {
                    $permohonan_num++;
                } $_SESSION['permohonan_num'] = $permohonan_num;

                foreach ($lamanweb_ditolak as $lamanweb_ditolak_data)
                {
                    $permohonan_ditolak_num++;
                }
                foreach ($aduan_ditolak as $aduan_ditolak_data)
                {
                    $permohonan_ditolak_num++;
                } $_SESSION['permohonan_ditolak_num'] = $permohonan_ditolak_num;

                foreach ($lamanweb_diproses as $lamanweb_diproses_data)
                {
                    $permohonan_diproses_num++;
                }
                foreach ($aduan_diproses as $aduan_diproses_data)
                {
                    $permohonan_diproses_num++;
                } $_SESSION['permohonan_diproses_num'] = $permohonan_diproses_num;

                foreach ($lamanweb_selesai as $lamanweb_selesai_data)
                {
                    $permohonan_selesai_num++;
                }
                foreach ($aduan_selesai as $aduan_selesai_data)
                {
                    $permohonan_selesai_num++;
                } $_SESSION['permohonan_selesai_num'] = $permohonan_selesai_num;




                $jabatan = $user->jabatan;

                return view('dashboard.dashboard',compact('user'));

                

            }
    }









}
