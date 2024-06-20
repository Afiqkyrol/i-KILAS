@extends('layout2')

@section('head')

<title>Edit Permohonan</title>

@endsection

@section('body')

<br>

<div style="padding-left:50px">
<a style="padding-left:25px; padding-right:25px;" href="{{route('senarai.editLamanWeb1',['id'=> $id -> id])}}" class="btn btn-primary btn-sm">Back</a>
</div>

<br>

<center><h2><b>Borang Permohonan Kemaskini Laman Web 2/3</b></h2></center><br>

<div style="padding-right:50px; padding-left:50px">

<br>

 @if($errors->any())
    <div style="padding-left:300px">
	    <ul>
	
		    @foreach($errors->all() as $error)
		
			    <li style="color:red">{{$error}}</li>
		
		    @endforeach
	
	    </ul>
    </div>
 @endif

 <br>

<div class="card" >

<form method="POST" action="{{route('senarai.editLamanWeb3',['id'=> $id -> id])}}">

<h2 class="card-header">
@csrf

<center>Jenis Pengemaskinian</center>

</h2>

<div class="card-body">

   

    <br>

    <div style="text-align:center">

        <input style="" type="radio" name="jenis_kemaskini" value="Maklumat Baru"
        @php if(strpos($_SESSION["jenis_kemaskini"], 'Maklumat Baru') !== false && $_SESSION['check_laman_web_2'] == "true") { @endphp checked @php } @endphp
        @php if(strpos($id->jenis_pengemaskinian, 'Maklumat Baru') !== false && $_SESSION['check_laman_web_2'] != "true") { @endphp checked @php } @endphp
        > MAKLUMAT BARU

        <input style="margin-left:150px;" type="radio" name="jenis_kemaskini" value="Pengemaskinian Maklumat"
        @php if(strpos($_SESSION["jenis_kemaskini"], 'Pengemaskinian Maklumat') !== false && $_SESSION['check_laman_web_2'] == "true") { @endphp checked @php } @endphp
        @php if(strpos($id->jenis_pengemaskinian, 'Pengemaskinian Maklumat') !== false && $_SESSION['check_laman_web_2'] != "true") { @endphp checked @php } @endphp
        > PENGEMASKINIAN MAKLUMAT

        <input style="margin-left:150px;" type="radio" name="jenis_kemaskini" value="Ralat/Pembetulan"
        @php if(strpos($_SESSION["jenis_kemaskini"], 'Ralat/Pembetulan') !== false && $_SESSION['check_laman_web_2'] == "true") { @endphp checked @php } @endphp
        @php if(strpos($id->jenis_pengemaskinian, 'Ralat/Pembetulan') !== false && $_SESSION['check_laman_web_2'] != "true") { @endphp checked @php } @endphp
        > RALAT/PEMBETULAN 

    </div><br>

</div>

</div>

<br><br>




@php if(strpos($_SESSION["kategori_saluran"], 'Laman Web') !== false){ @endphp


<div class="card" >

<h2 class="card-header">

<center>Laman Web</center>

</h2>

<div class="card-body">

<br>
    
    <div style="display:flex; text-align:center; margin-left:150px;">

        <div style="width:33%; text-align:left;"><input type="radio" name="kategori_maklumat_Laman_Web" value="Sorotan Penting"
        @php if(strpos($_SESSION["kategori_maklumat"], 'Sorotan Penting') !== false && $_SESSION['check_laman_web_2'] == "true") { @endphp checked @php } @endphp
        @php if(strpos($id->kategori_maklumat, 'Sorotan Penting') !== false && $_SESSION['check_laman_web_2'] != "true") { @endphp checked @php } @endphp
        > SOROTAN PENTING </div>

        <div style="width:33%; text-align:left;"><input type="radio" name="kategori_maklumat_Laman_Web" value="Bilik Berita"
        @php if(strpos($_SESSION["kategori_maklumat"], 'Bilik Berita') !== false && $_SESSION['check_laman_web_2'] == "true") { @endphp checked @php } @endphp
        @php if(strpos($id->kategori_maklumat, 'Bilik Berita') !== false && $_SESSION['check_laman_web_2'] != "true") { @endphp checked @php } @endphp
        > BILIK BERITA </div>

        <div style="width:33%; text-align:left;"><input type="radio" name="kategori_maklumat_Laman_Web" value="MPKlang"
        @php if(strpos($_SESSION["kategori_maklumat"], 'MPKlang') !== false && $_SESSION['check_laman_web_2'] == "true") { @endphp checked @php } @endphp
        @php if(strpos($id->kategori_maklumat, 'MPKlang') !== false && $_SESSION['check_laman_web_2'] != "true") { @endphp checked @php } @endphp
        > MPKLANG </div>

    </div><br>
    <div style="display:flex; text-align:center; margin-left:150px;">

        <div style="width:33%; text-align:left;"><input type="radio" name="kategori_maklumat_Laman_Web" value="Info Klang"
        @php if(strpos($_SESSION["kategori_maklumat"], 'Info Klang') !== false && $_SESSION['check_laman_web_2'] == "true") { @endphp checked @php } @endphp
        @php if(strpos($id->kategori_maklumat, 'Info Klang') !== false && $_SESSION['check_laman_web_2'] != "true") { @endphp checked @php } @endphp
        > INFO KLANG </div>

        <div style="width:33%; text-align:left;"><input type="radio" name="kategori_maklumat_Laman_Web" value="Perkhidmatan"
        @php if(strpos($_SESSION["kategori_maklumat"], 'Perkhidmatan') !== false && $_SESSION['check_laman_web_2'] == "true") { @endphp checked @php } @endphp
        @php if(strpos($id->kategori_maklumat, 'Perkhidmatan') !== false && $_SESSION['check_laman_web_2'] != "true") { @endphp checked @php } @endphp
        > PERKHIDMATAN </div>

        <div style="width:33%; text-align:left;"><input type="radio" name="kategori_maklumat_Laman_Web" value="Foto/Video"
        @php if(strpos($_SESSION["kategori_maklumat"], 'Foto/Video') !== false && $_SESSION['check_laman_web_2'] == "true") { @endphp checked @php } @endphp
        @php if(strpos($id->kategori_maklumat, 'Foto/Video') !== false && $_SESSION['check_laman_web_2'] != "true") { @endphp checked @php } @endphp
        > FOTO/VIDEO </div>

    </div><br>
    <div style="display:flex; text-align:center; margin-left:150px;">

        <div style="width:33%; text-align:left;"><input type="radio" name="kategori_maklumat_Laman_Web" value="Iklan Tawaran"
        @php if(strpos($_SESSION["kategori_maklumat"], 'Iklan Tawaran') !== false && $_SESSION['check_laman_web_2'] == "true") { @endphp checked @php } @endphp
        @php if(strpos($id->kategori_maklumat, 'Iklan Tawaran') !== false && $_SESSION['check_laman_web_2'] != "true") { @endphp checked @php } @endphp
        > IKLAN TAWARAN </div>

        <div style="width:33%; text-align:left;"><input type="radio" name="kategori_maklumat_Laman_Web" value="Maklumat Jabatan/Direktori"
        @php if(strpos($_SESSION["kategori_maklumat"], 'Maklumat Jabatan/Direktori') !== false && $_SESSION['check_laman_web_2'] == "true") { @endphp checked @php } @endphp
        @php if(strpos($id->kategori_maklumat, 'Maklumat Jabatan/Direktori') !== false && $_SESSION['check_laman_web_2'] != "true") { @endphp checked @php } @endphp
        > MAKLUMAT JABATAN/DIREKTORI </div>

        <div style="width:33%; text-align:left;"><input type="radio" name="kategori_maklumat_Laman_Web" value="Banner/Poster"
        @php if(strpos($_SESSION["kategori_maklumat"], 'Banner/Poster') !== false && $_SESSION['check_laman_web_2'] == "true") { @endphp checked @php } @endphp
        @php if(strpos($id->kategori_maklumat, 'Banner/Poster') !== false && $_SESSION['check_laman_web_2'] != "true") { @endphp checked @php } @endphp> BANNER/POSTER </div>

    </div><br>
    <div style="display:flex; text-align:center; margin-left:150px;">

        <div style="width:33%; text-align:left;"><input type="radio" name="kategori_maklumat_Laman_Web" value="Pengumuman"
        @php if(strpos($_SESSION["kategori_maklumat"], 'Pengumuman') !== false && $_SESSION['check_laman_web_2'] == "true") { @endphp checked @php } @endphp
        @php if(strpos($id->kategori_maklumat, 'Pengumuman') !== false && $_SESSION['check_laman_web_2'] != "true") { @endphp checked @php } @endphp
        > PENGUMUMAN </div>

        <div style="width:33%; text-align:left;"><input type="radio" name="kategori_maklumat_Laman_Web" value="Iklan Jawatan Kosong"
        @php if(strpos($_SESSION["kategori_maklumat"], 'Iklan Jawatan Kosong') !== false && $_SESSION['check_laman_web_2'] == "true") { @endphp checked @php } @endphp
        @php if(strpos($id->kategori_maklumat, 'Iklan Jawatan Kosong') !== false && $_SESSION['check_laman_web_2'] != "true") { @endphp checked @php } @endphp
        > IKLAN JAWATAN KOSONG </div>

        <div style="width:33%; text-align:left;"><input type="radio" name="kategori_maklumat_Laman_Web" value="Soal Selidik"
        @php if(strpos($_SESSION["kategori_maklumat"], 'Soal Selidik') !== false && $_SESSION['check_laman_web_2'] == "true") { @endphp checked @php } @endphp
        @php if(strpos($id->kategori_maklumat, 'Soal Selidik') !== false && $_SESSION['check_laman_web_2'] != "true") { @endphp checked @php } @endphp> SOAL SELIDIK </div>

    </div><br>
        

</div>

</div><br><br>

@php } @endphp




@php if(strpos($_SESSION["kategori_saluran"], 'Portal Akses') !== false){ @endphp

<div class="card" >

<h2 class="card-header">

<center>Portal Akses</center>

</h2>

<div class="card-body">

<br>
    
    <div style="display:flex; text-align:center; margin-left:150px;">

        <div style="width:33%; text-align:left;"><input type="radio" name="kategori_maklumat_Portal_Akses" value="Pengumuman Dalaman"
        @php if(strpos($_SESSION["kategori_maklumat"], 'Pengumuman Dalaman') !== false && $_SESSION['check_laman_web_2'] == "true") { @endphp checked @php } @endphp
        @php if(strpos($id->kategori_maklumat, 'Pengumuman Dalaman') !== false && $_SESSION['check_laman_web_2'] != "true") { @endphp checked @php } @endphp
        > PENGUMUMAN DALAMAN </div>

        <div style="width:33%; text-align:left;"><input type="radio" name="kategori_maklumat_Portal_Akses" value="Banner/Poster Dalaman"
        @php if(strpos($_SESSION["kategori_maklumat"], 'Banner/Poster Dalaman') !== false && $_SESSION['check_laman_web_2'] == "true") { @endphp checked @php } @endphp
        @php if(strpos($id->kategori_maklumat, 'Banner/Poster Dalaman') !== false && $_SESSION['check_laman_web_2'] != "true") { @endphp checked @php } @endphp
        > BANNER/POSTER DALAMAN </div>

        <div style="width:33%; text-align:left;"><input type="radio" name="kategori_maklumat_Portal_Akses" value="Aplikasi Dalaman"
        @php if(strpos($_SESSION["kategori_maklumat"], 'Aplikasi Dalaman') !== false && $_SESSION['check_laman_web_2'] == "true") { @endphp checked @php } @endphp
        @php if(strpos($id->kategori_maklumat, 'Aplikasi Dalaman') !== false && $_SESSION['check_laman_web_2'] != "true") { @endphp checked @php } @endphp
        > APLIKASI DALAMAN </div>

    </div><br>
    <div style="display:flex; text-align:center; margin-left:150px;">

        <div style="width:33%; text-align:left;"><input type="radio" name="kategori_maklumat_Portal_Akses" value="Profil"
        @php if(strpos($_SESSION["kategori_maklumat"], 'Profil') !== false && $_SESSION['check_laman_web_2'] == "true") { @endphp checked @php } @endphp
        @php if(strpos($id->kategori_maklumat, 'Profil') !== false && $_SESSION['check_laman_web_2'] != "true") { @endphp checked @php } @endphp
        > PROFIL </div>

        <div style="width:33%; text-align:left;"><input type="radio" name="kategori_maklumat_Portal_Akses" value="Direktori Kakitangan"
        @php if(strpos($_SESSION["kategori_maklumat"], 'Direktori Kakitangan') !== false && $_SESSION['check_laman_web_2'] == "true") { @endphp checked @php } @endphp
        @php if(strpos($id->kategori_maklumat, 'Direktori Kakitangan') !== false && $_SESSION['check_laman_web_2'] != "true") { @endphp checked @php } @endphp
        > DIREKTORI KAKITANGAN </div>

        <div style="width:33%; text-align:left;"><input type="radio" name="kategori_maklumat_Portal_Akses" value="Pusat Maklumat"
        @php if(strpos($_SESSION["kategori_maklumat"], 'Pusat Maklumat') !== false && $_SESSION['check_laman_web_2'] == "true") { @endphp checked @php } @endphp
        @php if(strpos($id->kategori_maklumat, 'Pusat Maklumat') !== false && $_SESSION['check_laman_web_2'] != "true") { @endphp checked @php } @endphp
        > PUSAT MAKLUMAT </div>

    </div><br>
    <div style="display:flex; text-align:center; margin-left:150px;">

        <div style="width:33%; text-align:left;"><input type="radio" name="kategori_maklumat_Portal_Akses" value="Pusat Pengetahuan"
        @php if(strpos($_SESSION["kategori_maklumat"], 'Pusat Pengetahuan') !== false && $_SESSION['check_laman_web_2'] == "true") { @endphp checked @php } @endphp
        @php if(strpos($id->kategori_maklumat, 'Pusat Pengetahuan') !== false && $_SESSION['check_laman_web_2'] != "true") { @endphp checked @php } @endphp
        > PUSAT PENGETAHUAN </div>

        <div style="width:33%; text-align:left;"><input type="radio" name="kategori_maklumat_Portal_Akses" value="Galeri Aktiviti"
        @php if(strpos($_SESSION["kategori_maklumat"], 'Galeri Aktiviti') !== false && $_SESSION['check_laman_web_2'] == "true") { @endphp checked @php } @endphp
        @php if(strpos($id->kategori_maklumat, 'Galeri Aktiviti') !== false && $_SESSION['check_laman_web_2'] != "true") { @endphp checked @php } @endphp
        > GALERI AKTIVITI </div>

        <div style="width:33%; text-align:left;"><input type="radio" name="kategori_maklumat_Portal_Akses" value="Soal Selidik Dalaman"
        @php if(strpos($_SESSION["kategori_maklumat"], 'Soal Selidik Dalaman') !== false && $_SESSION['check_laman_web_2'] == "true") { @endphp checked @php } @endphp
        @php if(strpos($id->kategori_maklumat, 'Soal Selidik Dalaman') !== false && $_SESSION['check_laman_web_2'] != "true") { @endphp checked @php } @endphp
        > SOAL SELIDIK DALAMAN </div>

    </div><br>
    <div style="display:flex; text-align:center; margin-left:150px;">

        <div style="width:33%; text-align:left;"><input type="radio" name="kategori_maklumat_Portal_Akses" value="Lain-Lain"> LAIN-LAIN(NYATAKAN): </div>

    </div>
    <div style="display:flex; text-align:center; margin-left:150px;">

        <div style="width:33%; text-align:left;"><input type="text" name="kategori_maklumat_lain-lain_Portal_Akses" /></div>

    </div><br>
        

</div>

</div><br><br>

@php } @endphp




@php if(strpos($_SESSION["kategori_saluran"], 'Facebook') !== false || strpos($_SESSION["kategori_saluran_lain-lain"], 'lainlain') !== false){ @endphp

<div class="card">

<h2 class="card-header">

<center>Facebook{{"/".$_SESSION['kategori_saluran_lain-lain2'];}}</center>

</h2>

<div class="card-body">

    <br>

    <div style="display:flex; text-align:center; margin-left:150px;">

        <div style="width:33%; text-align:left;"><input type="radio" name="kategori_maklumat_Fb/Media_Sosial" value="Pengumuman"
        @php if(strpos($_SESSION["kategori_maklumat"], 'Pengumuman') !== false && $_SESSION['check_laman_web_2'] == "true") { @endphp checked @php } @endphp
        @php if(strpos($id->kategori_maklumat, 'Pengumuman') !== false && $_SESSION['check_laman_web_2'] != "true") { @endphp checked @php } @endphp
        > PENGUMUMAN </div>

        <div style="width:33%; text-align:left;"><input type="radio" name="kategori_maklumat_Fb/Media_Sosial" value="Berita"
        @php if(strpos($_SESSION["kategori_maklumat"], 'Berita') !== false && $_SESSION['check_laman_web_2'] == "true") { @endphp checked @php } @endphp
        @php if(strpos($id->kategori_maklumat, 'Berita') !== false && $_SESSION['check_laman_web_2'] != "true") { @endphp checked @php } @endphp
        > BERITA </div>

        <div style="width:33%; text-align:left;"><input type="radio" name="kategori_maklumat_Fb/Media_Sosial" value="Aktiviti Semasa"
        @php if(strpos($_SESSION["kategori_maklumat"], 'Aktiviti Semasa') !== false && $_SESSION['check_laman_web_2'] == "true") { @endphp checked @php } @endphp
        @php if(strpos($id->kategori_maklumat, 'Aktiviti Semasa') !== false && $_SESSION['check_laman_web_2'] != "true") { @endphp checked @php } @endphp
        > AKTIVITI SEMASA </div>

    </div><br>
    <div style="display:flex; text-align:center; margin-left:150px;">

        <div style="width:33%; text-align:left;"><input type="radio" name="kategori_maklumat_Fb/Media_Sosial" value="Keratan Akhbar"
        @php if(strpos($_SESSION["kategori_maklumat"], 'Keratan Akhbar') !== false && $_SESSION['check_laman_web_2'] == "true") { @endphp checked @php } @endphp
        @php if(strpos($id->kategori_maklumat, 'Keratan Akhbar') !== false && $_SESSION['check_laman_web_2'] != "true") { @endphp checked @php } @endphp
        > KERATAN AKHBAR </div>

        <div style="width:33%; text-align:left;"><input type="radio" name="kategori_maklumat_Fb/Media_Sosial" value="Buletin MPKlang"
        @php if(strpos($_SESSION["kategori_maklumat"], 'Buletin MPKlang') !== false && $_SESSION['check_laman_web_2'] == "true") { @endphp checked @php } @endphp
        @php if(strpos($id->kategori_maklumat, 'Buletin MPKlang') !== false && $_SESSION['check_laman_web_2'] != "true") { @endphp checked @php } @endphp
        > BULETIN MPKLANG </div>

        <div style="width:33%; text-align:left;"><input type="radio" name="kategori_maklumat_Fb/Media_Sosial" value="Perwartaan"
        @php if(strpos($_SESSION["kategori_maklumat"], 'Perwartaan') !== false && $_SESSION['check_laman_web_2'] == "true") { @endphp checked @php } @endphp
        @php if(strpos($id->kategori_maklumat, 'Perwartaan') !== false && $_SESSION['check_laman_web_2'] != "true") { @endphp checked @php } @endphp
        > PERWARTAAN </div>

    </div><br>
    <div style="display:flex; text-align:center; margin-left:150px;">

        <div style="width:33%; text-align:left;"><input type="radio" name="kategori_maklumat_Fb/Media_Sosial" value="Lain-Lain"> LAIN-LAIN(NYATAKAN): </div>

    </div>
    <div style="display:flex; text-align:center; margin-left:150px;">

        <div style="width:33%; text-align:left;"><input type="text" name="kategori_maklumat_Fb/Media_Sosial_lain-lain" /></div>

    </div><br>

</div>

</div><br><br>

@php } @endphp

<center><button style="padding-left:25px; padding-right:25px;" class="btn btn-success btn-sm" type="submit">Next</button></center>

<br><br>

@endsection
