<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    public function generatePDF($id, $perkara)
    {
        if($perkara == "lamanweb")
        {
            $permohonan = \App\Models\KemaskiniLamanWeb::where('id','=',$id)->first();
            $user_name = $permohonan->name;
            $user = \App\Models\User::where('fullname','=',$user_name)->first();

            $data = [
                'title' => 'Laporan Permohonan',
                'user' => $user,
                'permohonan' => $permohonan,
            ];
          
            $pdf = PDF::loadView('PDF.myPDF', $data);
    
            return $pdf->download($user->fullname."_".$permohonan->perkara."_".$permohonan->id.".pdf");

        }else{

            $permohonan = \App\Models\KemaskiniAduan::where('id','=',$id)->first();
            $user_name = $permohonan->nama_pengadu;
            $user = \App\Models\User::where('fullname','=',$user_name)->first();

            $data = [
                'title' => 'Laporan Permohonan',
                'user' => $user,
                'permohonan' => $permohonan,
            ];
          
            $pdf = PDF::loadView('PDF.myPDF', $data);
    
            return $pdf->download($user->fullname."_".$permohonan->perkara."_".$permohonan->id.".pdf");

        }
    }

    public function lihatPDF($id, $perkara)
    {
        if($perkara == "lamanweb")
        {
            $permohonan = \App\Models\KemaskiniLamanWeb::where('id','=',$id)->first();
            $user_name = $permohonan->name;
            $user = \App\Models\User::where('fullname','=',$user_name)->first();

            $data = [
                'title' => 'Laporan Permohonan',
                'user' => $user,
                'permohonan' => $permohonan,
            ];
          
            return view('PDF.lihatPDF', $data);

        }else{

            $permohonan = \App\Models\KemaskiniAduan::where('id','=',$id)->first();
            $user_name = $permohonan->nama_pengadu;
            $user = \App\Models\User::where('fullname','=',$user_name)->first();

            $data = [
                'title' => 'Laporan Permohonan',
                'user' => $user,
                'permohonan' => $permohonan,
            ];
          
            return view('PDF.lihatPDF', $data);

        }
        
    }
}
