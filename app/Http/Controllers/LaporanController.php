<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function utama(Request $request)
    {
        session_start();

        

        

        if (empty($request->query('dari')) && empty($request->query('sehingga')) && ($request->query('status') == "SEMUA" || empty($request->query('status'))) && ($request->query('fjabatan') == "SEMUA" || empty($request->query('fjabatan'))))
        {
            $_SESSION['dari'] = $request->query('dari');
            $_SESSION['sehingga']= $request->query('sehingga');
            $_SESSION['status'] = $request->query('status');
            $_SESSION['fjabatan'] = $request->query('fjabatan');
            $_SESSION['jenis_permohonan'] = $request->query('jenis_permohonan');
            
            $filter = [
                'dari' => $_SESSION['dari'],
                'sehingga' => $_SESSION['sehingga'],
                'status' => $_SESSION['status'],
                'fjabatan' => $_SESSION['fjabatan'],
                'jenis_permohonan' => $_SESSION['jenis_permohonan'],
            ];


            $lamanweb = \App\Models\KemaskiniLamanWeb::paginate(5);
            $aduan = \App\Models\KemaskiniAduan::paginate(5);

        
            return view('senarai.laporan',$filter)->with('lamanweb', $lamanweb)->with('aduan', $aduan);

            //return view('senarai.laporan',compact('lamanweb'),compact('aduan'));

            //echo "no filter";

        }else{

            $dari = $request->query('dari');
            $sehingga = $request->query('sehingga');
            $status = $request->query('status');
            $fjabatan = $request->query('fjabatan');

            $_SESSION['dari'] = $request->query('dari');
            $_SESSION['sehingga']= $request->query('sehingga');
            $_SESSION['status'] = $request->query('status');
            $_SESSION['fjabatan'] = $request->query('fjabatan');
            $_SESSION['jenis_permohonan'] = $request->query('jenis_permohonan');

            $filter = [
                'dari' => $_SESSION['dari'],
                'sehingga' => $_SESSION['sehingga'],
                'status' => $_SESSION['status'],
                'fjabatan' => $_SESSION['fjabatan'],
                'jenis_permohonan' => $_SESSION['jenis_permohonan'],
            ];

            if($dari != null && $sehingga != null)
            {
                if($fjabatan == "SEMUA")
                {
                    if($status == "SEMUA")
                    {
                        $lamanweb = \App\Models\KemaskiniLamanWeb::where('created_at','>=',$dari)->where('created_at','<=',$sehingga)->paginate(5);
                        $aduan = \App\Models\KemaskiniAduan::where('created_at','>=',$dari)->where('created_at','<=',$sehingga)->paginate(5);

                    }else{

                        $lamanweb = \App\Models\KemaskiniLamanWeb::where('created_at','>=',$dari)->where('created_at','<=',$sehingga)->where('status','=',$status)->paginate(5);
                        $aduan = \App\Models\KemaskiniAduan::where('created_at','>=',$dari)->where('created_at','<=',$sehingga)->where('status','=',$status)->paginate(5);
                    }

                }else{

                    if($status == "SEMUA")
                    {
                        $lamanweb = \App\Models\KemaskiniLamanWeb::where('created_at','>=',$dari)->where('created_at','<=',$sehingga)->where('jabatan','=',$fjabatan)->paginate(5);
                        $aduan = \App\Models\KemaskiniAduan::where('created_at','>=',$dari)->where('created_at','<=',$sehingga)->where('jabatan','=',$fjabatan)->paginate(5);

                    }else{

                    $lamanweb = \App\Models\KemaskiniLamanWeb::where('created_at','>=',$dari)->where('created_at','<=',$sehingga)->where('status','=',$status)->where('jabatan','=',$fjabatan)->paginate(5);
                    $aduan = \App\Models\KemaskiniAduan::where('created_at','>=',$dari)->where('created_at','<=',$sehingga)->where('status','=',$status)->where('jabatan','=',$fjabatan)->paginate(5);
                    }

                }
            
            }elseif($dari != null && $sehingga == null){

                if($fjabatan == "SEMUA")
                {
                    if($status == "SEMUA")
                    {
                        $lamanweb = \App\Models\KemaskiniLamanWeb::where('created_at','>=',$dari)->paginate(5);
                        $aduan = \App\Models\KemaskiniAduan::where('created_at','>=',$dari)->paginate(5);

                    }else{

                        $lamanweb = \App\Models\KemaskiniLamanWeb::where('created_at','>=',$dari)->where('status','=',$status)->paginate(5);
                        $aduan = \App\Models\KemaskiniAduan::where('created_at','>=',$dari)->where('status','=',$status)->paginate(5);
                    }

                }else{

                    if($status == "SEMUA")
                    {
                        $lamanweb = \App\Models\KemaskiniLamanWeb::where('created_at','>=',$dari)->where('jabatan','=',$fjabatan)->paginate(5);
                        $aduan = \App\Models\KemaskiniAduan::where('created_at','>=',$dari)->where('jabatan','=',$fjabatan)->paginate(5);

                    }else{

                        $lamanweb = \App\Models\KemaskiniLamanWeb::where('created_at','>=',$dari)->where('status','==',$status)->where('jabatan','=',$fjabatan)->paginate(5);
                        $aduan = \App\Models\KemaskiniAduan::where('created_at','>=',$dari)->where('status','==',$status)->where('jabatan','=',$fjabatan)->paginate(5);
                    }

                }



            }elseif($dari == null && $sehingga != null){

                if($fjabatan == "SEMUA")
                {
                    if($status == "SEMUA")
                    {
                        $lamanweb = \App\Models\KemaskiniLamanWeb::where('created_at','<=',$sehingga)->paginate(5);
                        $aduan = \App\Models\KemaskiniAduan::where('created_at','<=',$sehingga)->paginate(5);

                    }else{

                        $lamanweb = \App\Models\KemaskiniLamanWeb::where('created_at','<=',$sehingga)->where('status','=',$status)->paginate(5);
                        $aduan = \App\Models\KemaskiniAduan::where('created_at','<=',$sehingga)->where('status','=',$status)->paginate(5);
                    }

                }else{

                    if($status == "SEMUA")
                    {
                        $lamanweb = \App\Models\KemaskiniLamanWeb::where('created_at','<=',$sehingga)->where('jabatan','=',$fjabatan)->paginate(5);
                        $aduan = \App\Models\KemaskiniAduan::where('created_at','<=',$sehingga)->where('jabatan','=',$fjabatan)->paginate(5);

                    }else{

                        $lamanweb = \App\Models\KemaskiniLamanWeb::where('created_at','<=',$sehingga)->where('status','==',$status)->where('jabatan','=',$fjabatan)->paginate(5);
                        $aduan = \App\Models\KemaskiniAduan::where('created_at','<=',$sehingga)->where('status','==',$status)->where('jabatan','=',$fjabatan)->paginate(5);
                    }

                }

            }elseif($dari == null && $sehingga == null){

                if($fjabatan == "SEMUA")
                {
                    if($status == "SEMUA")
                    {
                        $lamanweb = \App\Models\KemaskiniLamanWeb::paginate(5);
                        $aduan = \App\Models\KemaskiniAduan::paginate(5);

                    }else{

                        $lamanweb = \App\Models\KemaskiniLamanWeb::where('status','=',$status)->paginate(5);
                        $aduan = \App\Models\KemaskiniAduan::where('status','=',$status)->paginate(5);
                    }

                }else{

                    if($status == "SEMUA")
                    {
                        $lamanweb = \App\Models\KemaskiniLamanWeb::where('jabatan','=',$fjabatan)->paginate(5);
                        $aduan = \App\Models\KemaskiniAduan::where('jabatan','=',$fjabatan)->paginate(5);

                    }else{

                        $lamanweb = \App\Models\KemaskiniLamanWeb::where('status','=',$status)->where('jabatan','=',$fjabatan)->paginate(5);
                        $aduan = \App\Models\KemaskiniAduan::where('status','=',$status)->where('jabatan','=',$fjabatan)->paginate(5);
                    }

                }

            }

        
        //echo $request->query('status');
        return view('senarai.laporan',$filter)->with('lamanweb', $lamanweb)->with('aduan', $aduan);

        //echo $dari." ".$sehingga." ".$fjabatan." ".$status;

        //echo "filter";

        }
    }

    
}
