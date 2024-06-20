<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;

class PermohonanController extends Controller
{
    
    /*public function formlamanweb(Request $request)
    {

         session_start();

         if(empty($_SESSION["nokp"])) {

                $request->session()->flash('redirectLogin','You have to Login first!');
                return redirect()->route('login.index');

         }else{

        
        $nokp = $_SESSION["nokp"];
        $user = \App\Models\User::where('nokp','=',$nokp)->first();

        return view('borang-kemaskini.boranglamanweb',compact('user'));

        }

    }*/

    public function formlamanweb_1()
    {
        session_start();

         if(empty($_SESSION["nokp"])) {

                $request->session()->flash('redirectLogin','You have to Login first!');
                return redirect()->route('login.index');

         }else{

        
        $nokp = $_SESSION["nokp"];
        $user = \App\Models\User::where('nokp','=',$nokp)->first();

        $_SESSION["name"] = $user->fullname;
        $_SESSION["jabatan"] = $user->jabatan;

        return view('borang-kemaskini.lamanweb_1',compact('user'));

        }
    }

    public function formlamanweb_2(Request $request)
    {

        $kategori_saluran = "";

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

        session_start();
        $_SESSION['kategori_saluran'] = $kategori_saluran;
        $_SESSION['kategori_saluran_lain-lain'] = $request->input('kategori_saluran_lain-lain');
        $_SESSION['kategori_saluran_lain-lain2'] = $request->input('kategori_saluran_ruangan');

        return redirect()->route('borang.lamanweb21');
        //echo $kategori_saluran;

    }

    public function formlamanweb_21()
    {
        session_start();
        return view('borang-kemaskini.lamanweb_2');
    }

    public function formlamanweb_3(Request $request)
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

        //echo $_SESSION["kategori_maklumat"];
        return redirect()->route('borang.lamanweb31');
        
    }

    public function formlamanweb_31()
    {
        session_start();
        return view('borang-kemaskini.lamanweb_3');
    }

    public function saveformlamanweb(Request $request)
    {
        session_start();

        $brg_laman_web = new \App\Models\KemaskiniLamanWeb;

        $validatedData = $request->validate([

            'tajuk'=>'required|min:4|max:60',
            'keterangan'=>'required|min:10',
            'dateFrom'=>'required',
            'dateUntil'=>'required',

        ]);

        $disemak="-";
        $disahkan="-";
        $docname="";
        $docname2="";
        $docname3="";
        $docname4="";
        $docname5="";
        $docname6="";

        if($request->file('zipdoc')!=null){

            $doc = $request->file('zipdoc');
            $docname = $doc->getClientOriginalName();
            $doc->move(public_path('uploaded\\'.$_SESSION["name"].'\Dokumen Kemaskini Laman Web'), $docname);

        }

        if($request->file('zipdoc2')!=null){

            $doc2 = $request->file('zipdoc2');
            $docname2 = $doc2->getClientOriginalName();
            $doc2->move(public_path('uploaded\\'.$_SESSION["name"].'\Dokumen Kemaskini Laman Web'), $docname2);

        }

        if($request->file('zipdoc3')!=null){

            $doc3 = $request->file('zipdoc3');
            $docname3 = $doc3->getClientOriginalName();
            $doc3->move(public_path('uploaded\\'.$_SESSION["name"].'\Dokumen Kemaskini Laman Web'), $docname3);

        }

        if($request->file('zipdoc4')!=null){

            $doc4 = $request->file('zipdoc4');
            $docname4 = $doc4->getClientOriginalName();
            $doc4->move(public_path('uploaded\\'.$_SESSION["name"].'\Dokumen Kemaskini Laman Web'), $docname4);

        }

        if($request->file('zipdoc5')!=null){

            $doc5 = $request->file('zipdoc5');
            $docname5 = $doc5->getClientOriginalName();
            $doc5->move(public_path('uploaded\\'.$_SESSION["name"].'\Dokumen Kemaskini Laman Web'), $docname5);

        }

        if($request->file('zipdoc6')!=null){

            $doc6 = $request->file('zipdoc6');
            $docname6 = $doc6->getClientOriginalName();
            $doc6->move(public_path('uploaded\\'.$_SESSION["name"].'\Dokumen Kemaskini Laman Web'), $docname6);

        }

        $brg_laman_web = new \App\Models\KemaskiniLamanWeb;
        $brg_laman_web->name = $_SESSION["name"];
        $brg_laman_web->jabatan = $_SESSION["jabatan"];
        $brg_laman_web->nokp = $_SESSION["nokp"];
        $brg_laman_web->kategori_saluran = $_SESSION["kategori_saluran"];
        $brg_laman_web->kategori_maklumat = $_SESSION["kategori_maklumat"];
        $brg_laman_web->jenis_pengemaskinian = $_SESSION["jenis_kemaskini"];
        $brg_laman_web->tajuk = $request->input('tajuk');
        $brg_laman_web->keterangan = $request->input('keterangan');
        $brg_laman_web->from_date = $request->input('dateFrom');
        $brg_laman_web->to_date = $request->input('dateUntil');

        $brg_laman_web->zipdoc = $docname;
        $brg_laman_web->zipdoc2 = $docname2;
        $brg_laman_web->zipdoc3 = $docname3;
        $brg_laman_web->zipdoc4 = $docname4;
        $brg_laman_web->zipdoc5 = $docname5;
        $brg_laman_web->zipdoc6 = $docname6;

        $brg_laman_web->disemak = $disemak;
        $brg_laman_web->ulasan_penyelia = "-";
        $brg_laman_web->disahkan = $disahkan;
        $brg_laman_web->ulasan_pengarah = "-";
        $brg_laman_web->dikemaskini =  "-";
        $brg_laman_web->status = "DIPROSES";
        $brg_laman_web->perkara = "KEMASKINI LAMAN WEB";
        $brg_laman_web->url = "";
		$brg_laman_web->save();

        return redirect()->route('senarai.permohonan');
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    /*public function storelamanweb(Request $request)
    {
        $validatedData = $request->validate([

            'kategori_saluran'=>'required_without:kategori_saluran_lainlain',
            'kategori_saluran_lainlain'=>'required_without:kategori_saluran',
            'maklumat_kemaskini'=>'required',
            'kategori_maklumat'=>'required_without:kategori_maklumat_lainlain',
            'kategori_maklumat_lainlain'=>'required_without:kategori_maklumat',
            'jenis_kemaskini'=>'required',
            'tajuk'=>'required|min:4',
            'keterangan'=>'required|min:10',
            'dateFrom'=>'required',
            'dateUntil'=>'required'
            

        ]);


        if($request->input('kategori_saluran')!=null){

            $kategori_saluran = $request->input('kategori_saluran');
            
        }
        else{

            $kategori_saluran = $request->input('kategori_saluran_lainlain');
            
        }


        if($request->input('kategori_maklumat')!=null){

            $kategori_maklumat = $request->input('kategori_maklumat');
            
        }
        else{

            $kategori_maklumat = $request->input('kategori_maklumat_lainlain');
            
        }

        $imgname="";
        $docname="";

        if($request->file('gambar')!=null){

            $img=$request->file('gambar');
            $imgname = $img->getClientOriginalName();
            $img->move('C:\xampp\htdocs\i-KILAS\public\uploaded\Gambar Kemaskini Laman Web', $imgname);

        }

        if($request->file('zipdoc')!=null){

            $doc = $request->file('zipdoc');
            $docname = $doc->getClientOriginalName();
            $doc->move('C:\xampp\htdocs\i-KILAS\public\uploaded\Dokumen Kemaskini Laman Web', $docname);

        }

        $disemak="-";
        $disahkan="-";

        session_start();
        $nokp = $_SESSION["nokp"];

        $brg_laman_web = new \App\Models\KemaskiniLamanWeb;
        $brg_laman_web->name = $request->input('name');
		$brg_laman_web->jabatan = $request->input('jabatan');
        $brg_laman_web->nokp = $nokp;
        $brg_laman_web->maklumat_pengemaskinian = $request->input('maklumat_kemaskini');
        $brg_laman_web->tajuk = $request->input('tajuk');
        $brg_laman_web->keterangan = $request->input('keterangan');
        $brg_laman_web->kategori_saluran =  $kategori_saluran;
        $brg_laman_web->kategori_maklumat =  $kategori_maklumat;
        $brg_laman_web->jenis_pengemaskinian =  $request->input('jenis_kemaskini');
        $brg_laman_web->gambar = $imgname;
        $brg_laman_web->zipdoc = $docname;
        $brg_laman_web->from_date = $request->input('dateFrom');
        $brg_laman_web->to_date = $request->input('dateUntil');
        $brg_laman_web->disemak = $disemak;
        $brg_laman_web->ulasan_penyelia = "-";
        $brg_laman_web->disahkan = $disahkan;
        $brg_laman_web->ulasan_pengarah = "-";
        $brg_laman_web->dikemaskini =  "-";
        $brg_laman_web->status = "DIPROSES";
        $brg_laman_web->perkara = "KEMASKINI LAMAN WEB";
        $brg_laman_web->url = "";
		$brg_laman_web->save();

        return redirect()->route('dashboard.dashboard');

        

    }*/

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function formaduan(Request $request)
    {
        session_start();

        if(empty($_SESSION["nokp"])) {

                $request->session()->flash('redirectLogin','You have to Login first!');
                return redirect()->route('login.index');

        }else{

        $nokp = $_SESSION["nokp"];
        $user = \App\Models\User::where('nokp','=',$nokp)->first();

        return view('borang-kemaskini.borangaduan',compact('user'));

        }
      
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
   
    public function storeaduan(Request $request)
    {

        $validatedData = $request->validate([

            'no_rujukan'=>'required',
            'jenis_aduan'=>'required',
            'keterangan_aduan'=>'required|min:10',

        ]);

        $docname="";
        $docname2="";
        $docname3="";
        $docname4="";
        $docname5="";
        $docname6="";

        if($request->file('zipdoc')!=null){

            $doc = $request->file('zipdoc');
            $docname = $doc->getClientOriginalName();
            $doc->move(public_path('uploaded\\'.$request->input('nama_pengadu').'\Dokumen Kemaskini Aduan'), $docname);

        }

        if($request->file('zipdoc2')!=null){

            $doc2 = $request->file('zipdoc2');
            $docname2 = $doc2->getClientOriginalName();
            $doc2->move(public_path('uploaded\\'.$request->input('nama_pengadu').'\Dokumen Kemaskini Aduan'), $docname2);

        }

        if($request->file('zipdoc3')!=null){

            $doc3 = $request->file('zipdoc3');
            $docname3 = $doc3->getClientOriginalName();
            $doc3->move(public_path('uploaded\\'.$request->input('nama_pengadu').'\Dokumen Kemaskini Aduan'), $docname3);

        }

        if($request->file('zipdoc4')!=null){

            $doc4 = $request->file('zipdoc4');
            $docname4 = $doc4->getClientOriginalName();
            $doc4->move(public_path('uploaded\\'.$request->input('nama_pengadu').'\Dokumen Kemaskini Aduan'), $docname4);

        }

        if($request->file('zipdoc5')!=null){

            $doc5 = $request->file('zipdoc5');
            $docname5 = $doc5->getClientOriginalName();
            $doc5->move(public_path('uploaded\\'.$request->input('nama_pengadu').'\Dokumen Kemaskini Aduan'), $docname5);

        }

        if($request->file('zipdoc6')!=null){

            $doc6 = $request->file('zipdoc6');
            $docname6 = $doc6->getClientOriginalName();
            $doc6->move(public_path('uploaded\\'.$request->input('nama_pengadu').'\Dokumen Kemaskini Aduan'), $docname6);

        }

        $disemak="-";
        $disahkan="-";

        session_start();
        $nokp = $_SESSION["nokp"];

        $brg_aduan = new \App\Models\KemaskiniAduan;
        $brg_aduan->no_rujukan = $request->input('no_rujukan');
        $brg_aduan->nama_pengadu = $request->input('nama_pengadu');
        $brg_aduan->nokp = $nokp;
        $brg_aduan->jabatan = $request->input('jabatan');
        $brg_aduan->jenis_aduan = $request->input('jenis_aduan');
        $brg_aduan->keterangan_aduan = $request->input('keterangan_aduan');
        $brg_aduan->zipdoc =  $docname;
        $brg_aduan->zipdoc2 =  $docname2;
        $brg_aduan->zipdoc3 =  $docname3;
        $brg_aduan->zipdoc4 =  $docname4;
        $brg_aduan->zipdoc5 =  $docname5;
        $brg_aduan->zipdoc6 =  $docname6;
        $brg_aduan->disemak = $disemak;
        $brg_aduan->ulasan_penyelia = "-";
        $brg_aduan->disahkan = $disahkan;
        $brg_aduan->ulasan_pengarah = "-";
        $brg_aduan->dikemaskini =  "-";
        $brg_aduan->status =  "DIPROSES";
        $brg_aduan->perkara =  "KEMASKINI ADUAN";
        $brg_aduan->url =  "";
        $brg_aduan->save();

        return redirect()->route('dashboard.dashboard');
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    public function updateLamanWeb(Request $request)
    {

        $validatedData = $request->validate([

            'kategori_saluran'=>'required_without:kategori_saluran_lainlain',
            'kategori_saluran_lainlain'=>'required_without:kategori_saluran',
            'maklumat_kemaskini'=>'required',
            'kategori_maklumat'=>'required_without:kategori_maklumat_lainlain',
            'kategori_maklumat_lainlain'=>'required_without:kategori_maklumat',
            'jenis_kemaskini'=>'required',
            'tajuk'=>'required|min:4',
            'keterangan'=>'required|min:10',
            'dateFrom'=>'required',
            'dateUntil'=>'required'

        ]);

        if($request->input('kategori_saluran')!=null){

            $kategori_saluran = $request->input('kategori_saluran');
            
        }
        else{

            $kategori_saluran = $request->input('kategori_saluran_lainlain');
            
        }


        if($request->input('kategori_maklumat')!=null){

            $kategori_maklumat = $request->input('kategori_maklumat');
            
        }
        else{

            $kategori_maklumat = $request->input('kategori_maklumat_lainlain');
            
        }

        $id = $request->input('id');

        $lamanweb = \App\Models\KemaskiniLamanWeb::where('id','=',$id)->first();

        $imgname = $lamanweb->gambar;
        $docname = $lamanweb->zipdoc;

        if($request->file('zipdoc')!=null){

            $doc=$request->file('zipdoc');
            $docname = $doc->getClientOriginalName();
            $doc->move(public_path('uploaded\Dokumen Kemaskini Laman Web'), $docname);

        }

        session_start();
        $nokp = $_SESSION["nokp"];

        
        $lamanweb->name = $request->input('name');
		$lamanweb->jabatan = $request->input('jabatan');
        $lamanweb->nokp = $nokp;
        $lamanweb->maklumat_pengemaskinian = $request->input('maklumat_kemaskini');
        $lamanweb->tajuk = $request->input('tajuk');
        $lamanweb->keterangan = $request->input('keterangan');
        $lamanweb->kategori_saluran =  $kategori_saluran;
        $lamanweb->kategori_maklumat =  $kategori_maklumat;
        $lamanweb->jenis_pengemaskinian =  $request->input('jenis_kemaskini');
        $lamanweb->gambar = $imgname;
        $lamanweb->zipdoc = $docname;

        if($lamanweb->disahkan == "-"){

            $lamanweb->disemak = "-";

        }

        $lamanweb->from_date = $request->input('dateFrom');
        $lamanweb->to_date = $request->input('dateUntil');
        $lamanweb->ulasan_penyelia = "-";
        $lamanweb->disahkan = "-";
        $lamanweb->ulasan_pengarah = "-";
        $lamanweb->status = "DIPROSES";
        $lamanweb->perkara = "KEMASKINI LAMAN WEB";
		$lamanweb->save();

        return redirect()->route('senarai.permohonan');



    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function updateAduan(Request $request)
    {

        $validatedData = $request->validate([

            'no_rujukan'=>'required',
            'jenis_aduan'=>'required',
            'keterangan_aduan'=>'required|min:10',

        ]);

        $id = $request->input('id');

        $aduan = \App\Models\KemaskiniAduan::where('id','=',$id)->first();

        if($request->file('zipdoc')!=null){

            if($aduan->zipdoc != null){
                File::delete('uploaded\\'.$request->input('nama_pengadu').'\Dokumen Kemaskini Aduan\\'.$aduan->zipdoc);
            }

            $doc = $request->file('zipdoc');
            $docname = $doc->getClientOriginalName();
            $doc->move(public_path('uploaded\\'.$request->input('nama_pengadu').'\Dokumen Kemaskini Aduan'), $docname);
            $aduan->zipdoc = $docname;
        }

        if($request->file('zipdoc2')!=null){

            if($aduan->zipdoc2 != null){
                File::delete('uploaded\\'.$request->input('nama_pengadu').'\Dokumen Kemaskini Aduan\\'.$aduan->zipdoc2);
            }

            $doc2 = $request->file('zipdoc2');
            $docname2 = $doc2->getClientOriginalName();
            $doc2->move(public_path('uploaded\\'.$request->input('nama_pengadu').'\Dokumen Kemaskini Aduan'), $docname2);
            $aduan->zipdoc2 = $docname2;

        }

        if($request->file('zipdoc3')!=null){

            if($aduan->zipdoc3 != null){
                File::delete('uploaded\\'.$request->input('nama_pengadu').'\Dokumen Kemaskini Aduan\\'.$aduan->zipdoc3);
            }

            $doc3 = $request->file('zipdoc3');
            $docname3 = $doc3->getClientOriginalName();
            $doc3->move(public_path('uploaded\\'.$request->input('nama_pengadu').'\Dokumen Kemaskini Aduan'), $docname3);
            $aduan->zipdoc3 = $docname3;

        }

        if($request->file('zipdoc4')!=null){

            if($aduan->zipdoc4 != null){
                File::delete('uploaded\\'.$request->input('nama_pengadu').'\Dokumen Kemaskini Aduan\\'.$aduan->zipdoc4);
            }

            $doc4 = $request->file('zipdoc4');
            $docname4 = $doc4->getClientOriginalName();
            $doc4->move(public_path('uploaded\\'.$request->input('nama_pengadu').'\Dokumen Kemaskini Aduan'), $docname4);
            $aduan->zipdoc4 = $docname4;

        }

        if($request->file('zipdoc5')!=null){

            if($aduan->zipdoc5 != null){
                File::delete('uploaded\\'.$request->input('nama_pengadu').'\Dokumen Kemaskini Aduan\\'.$aduan->zipdoc5);
            }

            $doc5 = $request->file('zipdoc5');
            $docname5 = $doc5->getClientOriginalName();
            $doc5->move(public_path('uploaded\\'.$request->input('nama_pengadu').'\Dokumen Kemaskini Aduan'), $docname5);
            $aduan->zipdoc5 = $docname5;

        }

        if($request->file('zipdoc6')!=null){

            if($aduan->zipdoc6 != null){
                File::delete('uploaded\\'.$request->input('nama_pengadu').'\Dokumen Kemaskini Aduan\\'.$aduan->zipdoc6);
            }

            $doc6 = $request->file('zipdoc6');
            $docname6 = $doc6->getClientOriginalName();
            $doc6->move(public_path('uploaded\\'.$request->input('nama_pengadu').'\Dokumen Kemaskini Aduan'), $docname6);
            $aduan->zipdoc6 = $docname6;

        }

        session_start();
        $nokp = $_SESSION["nokp"];

        
        $aduan->no_rujukan = $request->input('no_rujukan');
        $aduan->nama_pengadu = $request->input('nama_pengadu');
        $aduan->nokp = $nokp;
        $aduan->jabatan = $request->input('jabatan');
        $aduan->jenis_aduan = $request->input('jenis_aduan');
        $aduan->keterangan_aduan = $request->input('keterangan_aduan');

        if($aduan->disahkan == "-"){

            $aduan->disemak = "-";

        }
        
        $aduan->ulasan_penyelia = "-";
        $aduan->disahkan = "-";
        $aduan->ulasan_pengarah = "-";
        $aduan->status =  "DIPROSES";
        $aduan->perkara =  "KEMASKINI ADUAN";
        $aduan->save();

        return redirect()->route('senarai.permohonan');

    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function deleteLamanWeb($id)
    {
        $deleteLamanWeb = \App\Models\KemaskiniLamanWeb::where('id','=',$id)->first();

        if($deleteLamanWeb->zipdoc != null){

            File::delete('uploaded\\'.$deleteLamanWeb->name.'\Dokumen Kemaskini Laman Web\\'.$deleteLamanWeb->zipdoc);
            
            $deleteLamanWeb->delete();
            
        }

        if($deleteLamanWeb->zipdoc2 != null){

            File::delete('uploaded\\'.$deleteLamanWeb->name.'\Dokumen Kemaskini Laman Web\\'.$deleteLamanWeb->zipdoc2);
            
            $deleteLamanWeb->delete();
            
        }

        if($deleteLamanWeb->zipdoc3 != null){

            File::delete('uploaded\\'.$deleteLamanWeb->name.'\Dokumen Kemaskini Laman Web\\'.$deleteLamanWeb->zipdoc3);
            
            $deleteLamanWeb->delete();
            
        }

        if($deleteLamanWeb->zipdoc4 != null){

            File::delete('uploaded\\'.$deleteLamanWeb->name.'\Dokumen Kemaskini Laman Web\\'.$deleteLamanWeb->zipdoc4);
            
            $deleteLamanWeb->delete();
            
        }

        if($deleteLamanWeb->zipdoc5 != null){

            File::delete('uploaded\\'.$deleteLamanWeb->name.'\Dokumen Kemaskini Laman Web\\'.$deleteLamanWeb->zipdoc5);
            
            $deleteLamanWeb->delete();
            
        }

        if($deleteLamanWeb->zipdoc6 != null){

            File::delete('uploaded\\'.$deleteLamanWeb->name.'\Dokumen Kemaskini Laman Web\\'.$deleteLamanWeb->zipdoc6);
            
            $deleteLamanWeb->delete();
            
        }

        return redirect()->route('senarai.permohonan');
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function deleteAduan($id)
    {

        $deleteAduan = \App\Models\KemaskiniAduan::where('id','=',$id)->first();

        if($deleteAduan->zipdoc != null){

            File::delete('uploaded\\'.$deleteAduan->nama_pengadu.'\Dokumen Kemaskini Aduan\\'.$deleteAduan->zipdoc);
            
            $deleteAduan->delete();
            
        }

        if($deleteAduan->zipdoc2 != null){

            File::delete('uploaded\\'.$deleteAduan->nama_pengadu.'\Dokumen Kemaskini Aduan\\'.$deleteAduan->zipdoc2);
            
            $deleteAduan->delete();
            
        }

        if($deleteAduan->zipdoc3 != null){

            File::delete('uploaded\\'.$deleteAduan->nama_pengadu.'\Dokumen Kemaskini Aduan\\'.$deleteAduan->zipdoc3);
            
            $deleteAduan->delete();
            
        }

        if($deleteAduan->zipdoc4 != null){

            File::delete('uploaded\\'.$deleteAduan->nama_pengadu.'\Dokumen Kemaskini Aduan\\'.$deleteAduan->zipdoc4);
            
            $deleteAduan->delete();
            
        }

        if($deleteAduan->zipdoc5 != null){

            File::delete('uploaded\\'.$deleteAduan->nama_pengadu.'\Dokumen Kemaskini Aduan\\'.$deleteAduan->zipdoc5);
            
            $deleteAduan->delete();
            
        }

        if($deleteAduan->zipdoc6 != null){

            File::delete('uploaded\\'.$deleteAduan->nama_pengadu.'\Dokumen Kemaskini Aduan\\'.$deleteAduan->zipdoc6);
            
            $deleteAduan->delete();
            
        }

        return redirect()->route('senarai.permohonan');

    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function removeAduan($id)
    {

        $removeAduan = \App\Models\KemaskiniAduan::where('id','=',$id)->first();
        $removeAduan->status = "REMOVED";
        $removeAduan->save();

        return redirect()->route('senarai.permohonan');

    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function removeLamanWeb($id)
    {

        $removeLamanweb = \App\Models\KemaskiniLamanWeb::where('id','=',$id)->first();
        $removeLamanweb->status = "REMOVED";
        $removeLamanweb->save();

        return redirect()->route('senarai.permohonan');

    }
}
