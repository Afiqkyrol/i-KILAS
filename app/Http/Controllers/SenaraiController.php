<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;

class SenaraiController extends Controller
{

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    public function permohonan(Request $request)
    {
        session_start();
        $_SESSION['jenis_kemaskini']="";
        $_SESSION['kategori_saluran']="";
        $_SESSION['kategori_maklumat']="";
        $_SESSION['check_laman_web_1']="";
        $_SESSION['check_laman_web_2']="";
        $_SESSION['tajuk']="";
        $_SESSION['keteragan']="";

        if(empty($_SESSION["nokp"])) {

                $request->session()->flash('redirectLogin','You have to Login first!');
                return redirect()->route('login.index');

        }else{

        $_SESSION["page"] = "senarai_permohonan";
        $nokp = $_SESSION["nokp"];
        $list = \App\Models\KemaskiniLamanWeb::where('nokp','=',$nokp)->where('status','!=','REMOVED')->get();
        $list2 = \App\Models\KemaskiniAduan::where('nokp','=',$nokp)->where('status','!=','REMOVED')->get();

        return view('senarai.permohonan',compact('list'),compact('list2'));

        }
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function permohonanViewLamanWeb($id)
    {
       session_start();

       if(empty($_SESSION["nokp"])) {

                $request->session()->flash('redirectLogin','You have to Login first!');
                return redirect()->route('login.index');

        }else{

        //$page = $_SESSION["page"];

        return view ('senarai.viewLamanWeb',['id'=>\App\Models\KemaskiniLamanWeb::findOrFail($id)]);

        }
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function permohonanViewAduan($id)
    {
        session_start();

        if(empty($_SESSION["nokp"])) {

                $request->session()->flash('redirectLogin','You have to Login first!');
                return redirect()->route('login.index');

        }else{

        return view ('senarai.viewAduan',['id'=>\App\Models\KemaskiniAduan::findOrFail($id)]);

        }
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function semakan(Request $request)
    {
        session_start();

        if(empty($_SESSION["nokp"])) {

                $request->session()->flash('redirectLogin','You have to Login first!');
                return redirect()->route('login.index');

        }else{
       
        $jabatan = $_SESSION["jabatan"];

        $list = \App\Models\KemaskiniLamanWeb::where('jabatan','=',$jabatan)->where('disemak','=','-')->get();
        $list2 = \App\Models\KemaskiniAduan::where('jabatan','=',$jabatan)->where('disemak','=','-')->get();


        return view('senarai.semakan',compact('list'),compact('list2'));

        }
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function pengesahan(Request $request)
    {
        session_start();

        if(empty($_SESSION["nokp"])) {

                $request->session()->flash('redirectLogin','You have to Login first!');
                return redirect()->route('login.index');

        }else{
       
        $jabatan = $_SESSION["jabatan"];

        $list = \App\Models\KemaskiniLamanWeb::where('jabatan','=',$jabatan)->where('disahkan','=','-')->where('status','!=','PERLU DIEDIT')->where('disemak','!=','-')->get();
        $list2 = \App\Models\KemaskiniAduan::where('jabatan','=',$jabatan)->where('disahkan','=','-')->where('status','!=','PERLU DIEDIT')->where('disemak','!=','-')->get();


        return view('senarai.pengesahan',compact('list'),compact('list2'));

        }
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function semakanViewLamanWeb($id)
    {
        session_start();

        if(empty($_SESSION["nokp"])) {

                $request->session()->flash('redirectLogin','You have to Login first!');
                return redirect()->route('login.index');

        }else{

        $lamanweb = \App\Models\KemaskiniLamanWeb::where('id','=',$id)->first();
        $name = $lamanweb->name;
        $user = \App\Models\User::where('fullname','=',$name)->first();

        return view ('senarai.viewSemakanLamanWeb',['id'=>\App\Models\KemaskiniLamanWeb::findOrFail($id)])->with('user', $user);

        }
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function semakanViewAduan($id)
    {
        session_start();

        if(empty($_SESSION["nokp"])) {

                $request->session()->flash('redirectLogin','You have to Login first!');
                return redirect()->route('login.index');

        }else{

        $aduan = \App\Models\KemaskiniAduan::where('id','=',$id)->first();
        $name = $aduan->nama_pengadu;
        $user = \App\Models\User::where('fullname','=',$name)->first();
       
        return view ('senarai.viewSemakanAduan',['id'=>\App\Models\KemaskiniAduan::findOrFail($id)])->with('user', $user);

        }
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function permohonanEditLamanWeb_1($id)
    {
        session_start();
        $_SESSION["formid"] = $id;


        if(empty($_SESSION["nokp"])) {

                $request->session()->flash('redirectLogin','You have to Login first!');
                return redirect()->route('login.index');

        }else{

        return view ('senarai.editLamanWeb_1',['id'=>\App\Models\KemaskiniLamanWeb::findOrFail($id)]);

        }
    }

    public function permohonanEditLamanWeb_2(Request $request,$id)
    {
        session_start();
        $kategori_saluran = "";
        $_SESSION['check_laman_web_1']="true";

        $validatedData = $request->validate([

            /*'kategori_saluran1'=>'',
            'kategori_saluran2'=>'',
            'kategori_saluran3'=>'',
            'kategori_saluran_lain-lain'=>'',*/
            'kategori_saluran_ruangan'=>'required_with:kategori_saluran_lain-lain',

        ]);

        $_SESSION['kategori_saluran_lain-lain2'] = "";

        if(empty($request->input('kategori_saluran1')) && empty($request->input('kategori_saluran2')) && empty($request->input('kategori_saluran3')) && empty($request->input('kategori_saluran_lain-lain')))
        {

            $request->session()->flash('form','Kategori Saluran field is required');
            return redirect()->route('borang.lamanweb1');

        }

        if($request->input('kategori_saluran1') == "Laman Web")
        {
            if($kategori_saluran == "")
            {
                $kategori_saluran = $request->input('kategori_saluran1');
            }
        }

        if($request->input('kategori_saluran2') == "Portal Akses")
        {
            if($kategori_saluran == "")
            {
                $kategori_saluran = $request->input('kategori_saluran2');

            }else{
                $kategori_saluran = $kategori_saluran.", ".$request->input('kategori_saluran2');
            }
        }

        if($request->input('kategori_saluran3') == "Facebook")
        {
            if($kategori_saluran == "")
            {
                $kategori_saluran = $request->input('kategori_saluran3');

            }else{
                $kategori_saluran = $kategori_saluran.", ".$request->input('kategori_saluran3');
            }
        }

        if($request->input('kategori_saluran_lain-lain') == "lainlain")
        {
            if($kategori_saluran == "")
            {
                $kategori_saluran = $request->input('kategori_saluran_ruangan');

            }else{
                $kategori_saluran = $kategori_saluran.", ".$request->input('kategori_saluran_ruangan');
            }
        }

        
        $_SESSION['kategori_saluran'] = $kategori_saluran;
        $_SESSION['kategori_saluran_lain-lain'] = $request->input('kategori_saluran_lain-lain');
        $_SESSION['kategori_saluran_lain-lain2'] = $request->input('kategori_saluran_ruangan');

        return redirect()->route('senarai.editLamanWeb21',['id'=> $id]);
        

    }

    public function permohonanEditLamanWeb_21($id)
    {

        session_start();

        return view('senarai.editLamanWeb_2',['id'=>\App\Models\KemaskiniLamanWeb::findOrFail($id)]);


    }

    public function permohonanEditLamanWeb_3(Request $request, $id)
    {

        session_start();

        $_SESSION["kategori_maklumat"] = "";

        $validatedData = $request->validate([

                'jenis_kemaskini'=>'required',

        ]);

        $_SESSION["jenis_kemaskini"] = $request->input('jenis_kemaskini');


        if(strpos($_SESSION["kategori_saluran"], 'Laman Web') !== false){

            $validatedData = $request->validate([

                'kategori_maklumat_Laman_Web'=>'required',

            ]);

            $_SESSION["kategori_maklumat"] = $request->input('kategori_maklumat_Laman_Web');

        }

        if(strpos($_SESSION["kategori_saluran"], 'Portal Akses') !== false){

            $validatedData = $request->validate([

                'kategori_maklumat_Portal_Akses'=>'required',
                

            ]);

            if($request->input('kategori_maklumat_Portal_Akses') == "Lain-Lain")
            {
                $validatedData = $request->validate([

                    'kategori_maklumat_lain-lain_Portal_Akses'=>'required_with:kategori_maklumat_Portal_Akses'

                ]);
                
            }

            if($request->input('kategori_maklumat_Portal_Akses') == "Lain-Lain")
            {
                $kategorimaklumatPA = $request->input('kategori_maklumat_lain-lain_Portal_Akses');

            }else{

                $kategorimaklumatPA = $request->input('kategori_maklumat_Portal_Akses');
            }

            if(empty($_SESSION["kategori_maklumat"]))
            {
                $_SESSION["kategori_maklumat"] = $kategorimaklumatPA;

            }else{

                $_SESSION["kategori_maklumat"] = $_SESSION["kategori_maklumat"].", ".$kategorimaklumatPA;
            }

        }

        if(strpos($_SESSION["kategori_saluran"], 'Facebook') !== false || strpos($_SESSION["kategori_saluran_lain-lain"], 'lainlain') !== false){

            $validatedData = $request->validate([

                'kategori_maklumat_Fb/Media_Sosial'=>'required',

            ]);

            if($request->input('kategori_maklumat_Fb/Media_Sosial') == "Lain-Lain")
            {
                $validatedData = $request->validate([

                    'kategori_maklumat_Fb/Media_Sosial_lain-lain'=>'required_with:kategori_maklumat_Fb/Media_Sosial'

                ]);
                
            }

            if($request->input('kategori_maklumat_Fb/Media_Sosial') == "Lain-Lain")
            {
                $kategorimaklumatFB = $request->input('kategori_maklumat_Fb/Media_Sosial_lain-lain');

            }else{

                $kategorimaklumatFB = $request->input('kategori_maklumat_Fb/Media_Sosial');
            }

            if(empty($_SESSION["kategori_maklumat"]))
            {
                $_SESSION["kategori_maklumat"] = $kategorimaklumatFB;

            }else{

                $_SESSION["kategori_maklumat"] = $_SESSION["kategori_maklumat"].", ".$kategorimaklumatFB;
            }

        }

        //echo $_SESSION['check_laman_web_2'];
        return redirect()->route('senarai.editLamanWeb31',['id'=> $id]);
        
    }

    public function permohonanEditLamanWeb_31($id)
    {
        session_start();

        $_SESSION['check_laman_web_2']="true";

        return view('senarai.editLamanWeb_3',['id'=>\App\Models\KemaskiniLamanWeb::findOrFail($id)]);
    }

    public function saveeditformlamanweb(Request $request, $id)
    {
        session_start();

        //echo $id;

        $brg_laman_web = \App\Models\KemaskiniLamanWeb::where('id','=',$id)->first();

        $validatedData = $request->validate([

            'tajuk'=>'required|min:4|max:60',
            'keterangan'=>'required|min:10',
            'dateFrom'=>'required',
            'dateUntil'=>'required',

        ]);

        if($request->file('zipdoc')!=null){

            if($brg_laman_web->zipdoc != null){
                File::delete('uploaded\\'.$brg_laman_web->name.'\Dokumen Kemaskini Laman Web\\'.$brg_laman_web->zipdoc);
            }

            $doc = $request->file('zipdoc');
            $docname = $doc->getClientOriginalName();
            $doc->move(public_path('uploaded\\'.$brg_laman_web->name.'\Dokumen Kemaskini Laman Web'), $docname);
            $brg_laman_web->zipdoc = $docname;
        }

        if($request->file('zipdoc2')!=null){

            if($brg_laman_web->zipdoc2 != null){
                File::delete('uploaded\\'.$brg_laman_web->name.'\Dokumen Kemaskini Laman Web\\'.$brg_laman_web->zipdoc2);
            }

            $doc2 = $request->file('zipdoc2');
            $docname2 = $doc2->getClientOriginalName();
            $doc2->move(public_path('uploaded\\'.$brg_laman_web->name.'\Dokumen Kemaskini Laman Web'), $docname2);
            $brg_laman_web->zipdoc2 = $docname2;

        }

        if($request->file('zipdoc3')!=null){

            if($brg_laman_web->zipdoc3 != null){
                File::delete('uploaded\\'.$brg_laman_web->name.'\Dokumen Kemaskini Laman Web\\'.$brg_laman_web->zipdoc3);
            }

            $doc3 = $request->file('zipdoc3');
            $docname3 = $doc3->getClientOriginalName();
            $doc3->move(public_path('uploaded\\'.$brg_laman_web->name.'\Dokumen Kemaskini Laman Web'), $docname3);
            $brg_laman_web->zipdoc3 = $docname3;

        }

        if($request->file('zipdoc4')!=null){

            if($brg_laman_web->zipdoc4 != null){
                File::delete('uploaded\\'.$brg_laman_web->name.'\Dokumen Kemaskini Laman Web\\'.$brg_laman_web->zipdoc4);
            }

            $doc4 = $request->file('zipdoc4');
            $docname4 = $doc4->getClientOriginalName();
            $doc4->move(public_path('uploaded\\'.$brg_laman_web->name.'\Dokumen Kemaskini Laman Web'), $docname4);
            $brg_laman_web->zipdoc4 = $docname4;

        }

        if($request->file('zipdoc5')!=null){

            if($brg_laman_web->zipdoc5 != null){
                File::delete('uploaded\\'.$brg_laman_web->name.'\Dokumen Kemaskini Laman Web\\'.$brg_laman_web->zipdoc5);
            }

            $doc5 = $request->file('zipdoc5');
            $docname5 = $doc5->getClientOriginalName();
            $doc5->move(public_path('uploaded\\'.$brg_laman_web->name.'\Dokumen Kemaskini Laman Web'), $docname5);
            $brg_laman_web->zipdoc5 = $docname5;

        }

        if($request->file('zipdoc6')!=null){

            if($brg_laman_web->zipdoc6 != null){
                File::delete('uploaded\\'.$brg_laman_web->name.'\Dokumen Kemaskini Laman Web\\'.$brg_laman_web->zipdoc6);
            }

            $doc6 = $request->file('zipdoc6');
            $docname6 = $doc6->getClientOriginalName();
            $doc6->move(public_path('uploaded\\'.$brg_laman_web->name.'\Dokumen Kemaskini Laman Web'), $docname6);
            $brg_laman_web->zipdoc6 = $docname6;

        }

        
        $brg_laman_web->kategori_saluran = $_SESSION["kategori_saluran"];
        $brg_laman_web->kategori_maklumat = $_SESSION["kategori_maklumat"];
        $brg_laman_web->jenis_pengemaskinian = $_SESSION["jenis_kemaskini"];
        $brg_laman_web->tajuk = $request->input('tajuk');
        $brg_laman_web->keterangan = $request->input('keterangan');
        $brg_laman_web->from_date = $request->input('dateFrom');
        $brg_laman_web->to_date = $request->input('dateUntil');

        if($brg_laman_web->disahkan == "-"){

            $brg_laman_web->disemak = "-";

        }

        $brg_laman_web->ulasan_penyelia = "-";
        $brg_laman_web->disahkan = "-";
        $brg_laman_web->ulasan_pengarah = "-";
        $brg_laman_web->dikemaskini =  "-";
        $brg_laman_web->status = "DIPROSES";
		$brg_laman_web->save();

        return redirect()->route('senarai.permohonan');
    }

    public function deleteFile($num,$id,$perkara)
    {
        session_start();

        if($perkara == "kemaskini"){
        
        $brg_laman_web = \App\Models\KemaskiniLamanWeb::where('id','=',$id)->first();

        if($num == 1)
        {
            File::delete('uploaded\\'.$brg_laman_web->name.'\Dokumen Kemaskini Laman Web\\'.$brg_laman_web->zipdoc);
            $brg_laman_web->zipdoc = "";
            $brg_laman_web->save();
        }
        if($num == 2)
        {
            File::delete('uploaded\\'.$brg_laman_web->name.'\Dokumen Kemaskini Laman Web\\'.$brg_laman_web->zipdoc2);
            $brg_laman_web->zipdoc2 = "";
            $brg_laman_web->save();
        }
        if($num == 3)
        {
            File::delete('uploaded\\'.$brg_laman_web->name.'\Dokumen Kemaskini Laman Web\\'.$brg_laman_web->zipdoc3);
            $brg_laman_web->zipdoc3 = "";
            $brg_laman_web->save();
        }
        if($num == 4)
        {
            File::delete('uploaded\\'.$brg_laman_web->name.'\Dokumen Kemaskini Laman Web\\'.$brg_laman_web->zipdoc4);
            $brg_laman_web->zipdoc4 = "";
            $brg_laman_web->save();
        }
        if($num == 5)
        {
            File::delete('uploaded\\'.$brg_laman_web->name.'\Dokumen Kemaskini Laman Web\\'.$brg_laman_web->zipdoc5);
            $brg_laman_web->zipdoc5 = "";
            $brg_laman_web->save();
        }
        if($num == 6)
        {
            File::delete('uploaded\\'.$brg_laman_web->name.'\Dokumen Kemaskini Laman Web\\'.$brg_laman_web->zipdoc6);
            $brg_laman_web->zipdoc6 = "";
            $brg_laman_web->save();
        }

        return redirect()->route('senarai.editLamanWeb31',['id'=>$id]);

        }elseif($perkara == "aduan"){

        $brg_aduan = \App\Models\KemaskiniAduan::where('id','=',$id)->first();

        if($num == 1)
        {
            File::delete('uploaded\\'.$brg_aduan->nama_pengadu.'\Dokumen Kemaskini Aduan\\'.$brg_aduan->zipdoc);
            $brg_aduan->zipdoc = "";
            $brg_aduan->save();
        }
        if($num == 2)
        {
            File::delete('uploaded\\'.$brg_aduan->nama_pengadu.'\Dokumen Kemaskini Aduan\\'.$brg_aduan->zipdoc2);
            $brg_aduan->zipdoc2 = "";
            $brg_aduan->save();
        }
        if($num == 3)
        {
            File::delete('uploaded\\'.$brg_aduan->nama_pengadu.'\Dokumen Kemaskini Aduan\\'.$brg_aduan->zipdoc3);
            $brg_aduan->zipdoc3 = "";
            $brg_aduan->save();
        }
        if($num == 4)
        {
            File::delete('uploaded\\'.$brg_aduan->nama_pengadu.'\Dokumen Kemaskini Aduan\\'.$brg_aduan->zipdoc4);
            $brg_aduan->zipdoc4 = "";
            $brg_aduan->save();
        }
        if($num == 5)
        {
            File::delete('uploaded\\'.$brg_aduan->nama_pengadu.'\Dokumen Kemaskini Aduan\\'.$brg_aduan->zipdoc5);
            $brg_aduan->zipdoc5 = "";
            $brg_aduan->save();
        }
        if($num == 6)
        {
            File::delete('uploaded\\'.$brg_aduan->nama_pengadu.'\Dokumen Kemaskini Aduan\\'.$brg_aduan->zipdoc6);
            $brg_aduan->zipdoc6 = "";
            $brg_aduan->save();
        }

        return redirect()->route('senarai.editAduan',['id'=>$id]);

        }

    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function downloadFile($num,$id,$perkara)
    {
      if($perkara == "lamanweb"){

        $brg_laman_web = \App\Models\KemaskiniLamanWeb::where('id','=',$id)->first();

        if($num == 1)
        {

            $path = public_path('uploaded\\'.$brg_laman_web->name.'\Dokumen Kemaskini Laman Web\\'.$brg_laman_web->zipdoc);
            return response()->download($path);

            //return Storage::download('C:\xampp\htdocs\i-KILAS\public\uploaded\\'.$brg_laman_web->name.'\Dokumen Kemaskini Laman Web\\'.$brg_laman_web->zipdoc);
        }
        if($num == 2)
        {

            $path = public_path('uploaded\\'.$brg_laman_web->name.'\Dokumen Kemaskini Laman Web\\'.$brg_laman_web->zipdoc2);
            return response()->download($path);

            //return Storage::download('C:\xampp\htdocs\i-KILAS\public\uploaded\\'.$brg_laman_web->name.'\Dokumen Kemaskini Laman Web\\'.$brg_laman_web->zipdoc);
        }
        if($num == 3)
        {

            $path = public_path('uploaded\\'.$brg_laman_web->name.'\Dokumen Kemaskini Laman Web\\'.$brg_laman_web->zipdoc3);
            return response()->download($path);

            //return Storage::download('C:\xampp\htdocs\i-KILAS\public\uploaded\\'.$brg_laman_web->name.'\Dokumen Kemaskini Laman Web\\'.$brg_laman_web->zipdoc);
        }
        if($num == 4)
        {

            $path = public_path('uploaded\\'.$brg_laman_web->name.'\Dokumen Kemaskini Laman Web\\'.$brg_laman_web->zipdoc4);
            return response()->download($path);

            //return Storage::download('C:\xampp\htdocs\i-KILAS\public\uploaded\\'.$brg_laman_web->name.'\Dokumen Kemaskini Laman Web\\'.$brg_laman_web->zipdoc);
        }
        if($num == 5)
        {

            $path = public_path('uploaded\\'.$brg_laman_web->name.'\Dokumen Kemaskini Laman Web\\'.$brg_laman_web->zipdoc5);
            return response()->download($path);

            //return Storage::download('C:\xampp\htdocs\i-KILAS\public\uploaded\\'.$brg_laman_web->name.'\Dokumen Kemaskini Laman Web\\'.$brg_laman_web->zipdoc);
        }
        if($num == 6)
        {

            $path = public_path('uploaded\\'.$brg_laman_web->name.'\Dokumen Kemaskini Laman Web\\'.$brg_laman_web->zipdoc6);
            return response()->download($path);

            //return Storage::download('C:\xampp\htdocs\i-KILAS\public\uploaded\\'.$brg_laman_web->name.'\Dokumen Kemaskini Laman Web\\'.$brg_laman_web->zipdoc);
        }
      }else{

        $brg_aduan = \App\Models\KemaskiniAduan::where('id','=',$id)->first();

        if($num == 1)
        {

            $path = public_path('uploaded\\'.$brg_aduan->nama_pengadu.'\Dokumen Kemaskini Aduan\\'.$brg_aduan->zipdoc);
            return response()->download($path);

            //return Storage::download('C:\xampp\htdocs\i-KILAS\public\uploaded\\'.$brg_laman_web->name.'\Dokumen Kemaskini Laman Web\\'.$brg_laman_web->zipdoc);
        }
        if($num == 2)
        {

            $path = public_path('uploaded\\'.$brg_aduan->nama_pengadu.'\Dokumen Kemaskini Aduan\\'.$brg_aduan->zipdoc2);
            return response()->download($path);

            //return Storage::download('C:\xampp\htdocs\i-KILAS\public\uploaded\\'.$brg_laman_web->name.'\Dokumen Kemaskini Laman Web\\'.$brg_laman_web->zipdoc);
        }
        if($num == 3)
        {

            $path = public_path('uploaded\\'.$brg_aduan->nama_pengadu.'\Dokumen Kemaskini Aduan\\'.$brg_aduan->zipdoc3);
            return response()->download($path);

            //return Storage::download('C:\xampp\htdocs\i-KILAS\public\uploaded\\'.$brg_laman_web->name.'\Dokumen Kemaskini Laman Web\\'.$brg_laman_web->zipdoc);
        }
        if($num == 4)
        {

            $path = public_path('uploaded\\'.$brg_aduan->nama_pengadu.'\Dokumen Kemaskini Aduan\\'.$brg_aduan->zipdoc4);
            return response()->download($path);

            //return Storage::download('C:\xampp\htdocs\i-KILAS\public\uploaded\\'.$brg_laman_web->name.'\Dokumen Kemaskini Laman Web\\'.$brg_laman_web->zipdoc);
        }
        if($num == 5)
        {

            $path = public_path('uploaded\\'.$brg_aduan->nama_pengadu.'\Dokumen Kemaskini Aduan\\'.$brg_aduan->zipdoc5);
            return response()->download($path);

            //return Storage::download('C:\xampp\htdocs\i-KILAS\public\uploaded\\'.$brg_laman_web->name.'\Dokumen Kemaskini Laman Web\\'.$brg_laman_web->zipdoc);
        }
        if($num == 6)
        {

            $path = public_path('uploaded\\'.$brg_aduan->nama_pengadu.'\Dokumen Kemaskini Aduan\\'.$brg_aduan->zipdoc6);
            return response()->download($path);

            //return Storage::download('C:\xampp\htdocs\i-KILAS\public\uploaded\\'.$brg_laman_web->name.'\Dokumen Kemaskini Laman Web\\'.$brg_laman_web->zipdoc);
        }

      }
    }





    //////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function permohonanEditAduan($id)
    {
        session_start();

        if(empty($_SESSION["nokp"])) {

                $request->session()->flash('redirectLogin','You have to Login first!');
                return redirect()->route('login.index');

        }else{

        return view ('senarai.editAduan',['id'=>\App\Models\KemaskiniAduan::findOrFail($id)]);

        }
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function pengesahanViewAduan($id)
    {
        session_start();

        if(empty($_SESSION["nokp"])) {

                $request->session()->flash('redirectLogin','You have to Login first!');
                return redirect()->route('login.index');

        }else{

        $aduan = \App\Models\KemaskiniAduan::where('id','=',$id)->first();
        $name = $aduan->nama_pengadu;
        $user = \App\Models\User::where('fullname','=',$name)->first();

        return view ('senarai.viewPengesahanAduan',['id'=>\App\Models\KemaskiniAduan::findOrFail($id)])->with('user', $user);

        }
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function pengesahanViewLamanWeb($id)
    {
        session_start();

        if(empty($_SESSION["nokp"])) {

                $request->session()->flash('redirectLogin','You have to Login first!');
                return redirect()->route('login.index');

        }else{

        $lamanweb = \App\Models\KemaskiniLamanWeb::where('id','=',$id)->first();
        $name = $lamanweb->name;
        $user = \App\Models\User::where('fullname','=',$name)->first();

        return view ('senarai.viewPengesahanLamanWeb',['id'=>\App\Models\KemaskiniLamanWeb::findOrFail($id)])->with('user', $user);

        }
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function kemaskini(Request $request)
    {
        session_start();

        if(empty($_SESSION["nokp"])) {

                $request->session()->flash('redirectLogin','You have to Login first!');
                return redirect()->route('login.index');

        }else{

            $user = \App\Models\User::where('nokp','=',$_SESSION["nokp"])->first();

            if($user->jabatan == "JABATAN KOMUNIKASI KORPORAT")
            {

                $nokp = $_SESSION["nokp"];
                $list = \App\Models\KemaskiniLamanWeb::where('disemak','!=','-')->where('disahkan','!=','-')->where('status','=','DIPROSES')->where('kategori_saluran','=','Facebook')->get();
                $list2 = \App\Models\KemaskiniAduan::where('disemak','!=','-')->where('disahkan','!=','-')->where('status','=','KOSONG')->get();

            }else{

                $nokp = $_SESSION["nokp"];
                $list = \App\Models\KemaskiniLamanWeb::where('disemak','!=','-')->where('disahkan','!=','-')->where('status','=','DIPROSES')->get();
                $list2 = \App\Models\KemaskiniAduan::where('disemak','!=','-')->where('disahkan','!=','-')->where('status','=','DIPROSES')->get();

            }
       
        

        return view('senarai.kemaskini',compact('list'),compact('list2'));

        }
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function kemaskiniViewAduan($id)
    {
        session_start();

        if(empty($_SESSION["nokp"])) {

                $request->session()->flash('redirectLogin','You have to Login first!');
                return redirect()->route('login.index');

        }else{

        $aduan = \App\Models\KemaskiniAduan::where('id','=',$id)->first();
        $name = $aduan->nama_pengadu;
        $user = \App\Models\User::where('fullname','=',$name)->first();

        return view ('senarai.viewKemaskiniAduan',['id'=>\App\Models\KemaskiniAduan::findOrFail($id)])->with('user', $user);

       }
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function kemaskiniViewLamanWeb($id)
    {
        session_start();

        if(empty($_SESSION["nokp"])) {

                $request->session()->flash('redirectLogin','You have to Login first!');
                return redirect()->route('login.index');

        }else{

        $lamanweb = \App\Models\KemaskiniLamanWeb::where('id','=',$id)->first();
        $name = $lamanweb->name;
        $user = \App\Models\User::where('fullname','=',$name)->first();

        return view ('senarai.viewKemaskiniLamanWeb',['id'=>\App\Models\KemaskiniLamanWeb::findOrFail($id)])->with('user', $user);

       }
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function maklumat(Request $request)
    {
        session_start();

        if(empty($_SESSION["nokp"])) {

                $request->session()->flash('redirectLogin','You have to Login first!');
                return redirect()->route('login.index');

        }else{
       
        
        $list = \App\Models\KemaskiniLamanWeb::all();
        $list2 = \App\Models\KemaskiniAduan::all();

        $_SESSION["page"] = "senarai_maklumat";

        return view('senarai.maklumat',compact('list'),compact('list2'));

        }
    }

    public function senaraijabatan(Request $request)
    {
        session_start();

        if(empty($_SESSION["nokp"])) {

                $request->session()->flash('redirectLogin','You have to Login first!');
                return redirect()->route('login.index');

        }else{

        $_SESSION["page"]= "senarai_jabatan";
        $jabatan = $_SESSION["jabatan"];

        
        
        $list = \App\Models\KemaskiniLamanWeb::where('jabatan','=',$jabatan)->get();
        $list2 = \App\Models\KemaskiniAduan::where('jabatan','=',$jabatan)->get();

        $_SESSION["page"] = "senarai_jabatan";

        return view('senarai.jabatan',compact('list'),compact('list2'));

        }
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function senarai_status($status)
    {
        session_start();
        $_SESSION['jenis_kemaskini']="";
        $_SESSION['kategori_saluran']="";
        $_SESSION['kategori_maklumat']="";
        $_SESSION['check_laman_web_1']="";
        $_SESSION['check_laman_web_2']="";
        $_SESSION['tajuk']="";
        $_SESSION['keteragan']="";

        if(empty($_SESSION["nokp"])) {

                $request->session()->flash('redirectLogin','You have to Login first!');
                return redirect()->route('login.index');

        }else{

        $nokp = $_SESSION["nokp"];
        $list = \App\Models\KemaskiniLamanWeb::where('nokp','=',$nokp)->where('status','=',$status)->get();
        $list2 = \App\Models\KemaskiniAduan::where('nokp','=',$nokp)->where('status','=',$status)->get();

        return view('senarai.permohonan',compact('list'),compact('list2'));

        

        }

        //echo $status;

    }

    public function senarai_status_admin($status)
    {

        session_start();

        if(empty($_SESSION["nokp"])) {

                $request->session()->flash('redirectLogin','You have to Login first!');
                return redirect()->route('login.index');

        }else{

            if($status == "SEMUA")
            {

                $list = \App\Models\KemaskiniLamanWeb::get();
                $list2 = \App\Models\KemaskiniAduan::get();

                return view('senarai.Adminstatus',compact('list'),compact('list2'));

            }else{

                $list = \App\Models\KemaskiniLamanWeb::where('status','=',$status)->get();
                $list2 = \App\Models\KemaskiniAduan::where('status','=',$status)->get();

                return view('senarai.Adminstatus',compact('list'),compact('list2'));

            }

        

        

        }

    }
}
