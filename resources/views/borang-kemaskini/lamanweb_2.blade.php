@extends('layout2')

@section('head')

<title>Borang Permohonan Kemaskini Laman Web</title>

@endsection

@section('body')

<br>

<div style="padding-left:50px">
<a style="padding-left:25px; padding-right:25px;" href="{{route('borang.lamanweb1')}}" class="btn btn-primary btn-sm">Back</a>
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

<form method="POST" action="{{route('borang.lamanweb3')}}">

<h2 class="card-header">
@csrf

<center>Jenis Pengemaskinian</center>

</h2>

<div class="card-body">

   

    <br>

    <div style="text-align:center">

        <input style="" type="radio" name="jenis_kemaskini" value="Maklumat Baru"> MAKLUMAT BARU 
        <input style="margin-left:150px;" type="radio" name="jenis_kemaskini" value="Pengemaskinian Maklumat"> PENGEMASKINIAN MAKLUMAT 
        <input style="margin-left:150px;" type="radio" name="jenis_kemaskini" value="Ralat/Pembetulan"> RALAT/PEMBETULAN 

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

        <div style="width:33%; text-align:left;"><input type="radio" name="kategori_maklumat_Laman_Web" value="Sorotan Penting"> SOROTAN PENTING </div>
        <div style="width:33%; text-align:left;"><input type="radio" name="kategori_maklumat_Laman_Web" value="Bilik Berita"> BILIK BERITA </div>
        <div style="width:33%; text-align:left;"><input type="radio" name="kategori_maklumat_Laman_Web" value="MPKlang"> MPKLANG </div>

    </div><br>
    <div style="display:flex; text-align:center; margin-left:150px;">

        <div style="width:33%; text-align:left;"><input type="radio" name="kategori_maklumat_Laman_Web" value="Info Klang"> INFO KLANG </div>
        <div style="width:33%; text-align:left;"><input type="radio" name="kategori_maklumat_Laman_Web" value="Perkhidmatan"> PERKHIDMATAN </div>
        <div style="width:33%; text-align:left;"><input type="radio" name="kategori_maklumat_Laman_Web" value="Foto/Video"> FOTO/VIDEO </div>

    </div><br>
    <div style="display:flex; text-align:center; margin-left:150px;">

        <div style="width:33%; text-align:left;"><input type="radio" name="kategori_maklumat_Laman_Web" value="Iklan Tawaran"> IKLAN TAWARAN </div>
        <div style="width:33%; text-align:left;"><input type="radio" name="kategori_maklumat_Laman_Web" value="Maklumat Jabatan/Direktori"> MAKLUMAT JABATAN/DIREKTORI </div>
        <div style="width:33%; text-align:left;"><input type="radio" name="kategori_maklumat_Laman_Web" value="Banner/Poster"> BANNER/POSTER </div>

    </div><br>
    <div style="display:flex; text-align:center; margin-left:150px;">

        <div style="width:33%; text-align:left;"><input type="radio" name="kategori_maklumat_Laman_Web" value="Pengumuman"> PENGUMUMAN </div>
        <div style="width:33%; text-align:left;"><input type="radio" name="kategori_maklumat_Laman_Web" value="Iklan Jawatan Kosong"> IKLAN JAWATAN KOSONG </div>
        <div style="width:33%; text-align:left;"><input type="radio" name="kategori_maklumat_Laman_Web" value="Soal Selidik"> SOAL SELIDIK </div>

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

        <div style="width:33%; text-align:left;"><input type="radio" name="kategori_maklumat_Portal_Akses" value="Pengumuman Dalaman"> PENGUMUMAN DALAMAN </div>
        <div style="width:33%; text-align:left;"><input type="radio" name="kategori_maklumat_Portal_Akses" value="Banner/Poster Dalaman"> BANNER/POSTER DALAMAN </div>
        <div style="width:33%; text-align:left;"><input type="radio" name="kategori_maklumat_Portal_Akses" value="Aplikasi Dalaman"> APLIKASI DALAMAN </div>

    </div><br>
    <div style="display:flex; text-align:center; margin-left:150px;">

        <div style="width:33%; text-align:left;"><input type="radio" name="kategori_maklumat_Portal_Akses" value="Profil"> PROFIL </div>
        <div style="width:33%; text-align:left;"><input type="radio" name="kategori_maklumat_Portal_Akses" value="Direktori Kakitangan"> DIREKTORI KAKITANGAN </div>
        <div style="width:33%; text-align:left;"><input type="radio" name="kategori_maklumat_Portal_Akses" value="Pusat Maklumat"> PUSAT MAKLUMAT </div>

    </div><br>
    <div style="display:flex; text-align:center; margin-left:150px;">

        <div style="width:33%; text-align:left;"><input type="radio" name="kategori_maklumat_Portal_Akses" value="Pusat Pengetahuan"> PUSAT PENGETAHUAN </div>
        <div style="width:33%; text-align:left;"><input type="radio" name="kategori_maklumat_Portal_Akses" value="Galeri Aktiviti"> GALERI AKTIVITI </div>
        <div style="width:33%; text-align:left;"><input type="radio" name="kategori_maklumat_Portal_Akses" value="Soal Selidik Dalaman"> SOAL SELIDIK DALAMAN </div>

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

        <div style="width:33%; text-align:left;"><input type="radio" name="kategori_maklumat_Fb/Media_Sosial" value="Pengumuman"> PENGUMUMAN </div>
        <div style="width:33%; text-align:left;"><input type="radio" name="kategori_maklumat_Fb/Media_Sosial" value="Berita"> BERITA </div>
        <div style="width:33%; text-align:left;"><input type="radio" name="kategori_maklumat_Fb/Media_Sosial" value="Aktiviti Semasa"> AKTIVITI SEMASA </div>

    </div><br>
    <div style="display:flex; text-align:center; margin-left:150px;">

        <div style="width:33%; text-align:left;"><input type="radio" name="kategori_maklumat_Fb/Media_Sosial" value="Keratan Akhbar"> KERATAN AKHBAR </div>
        <div style="width:33%; text-align:left;"><input type="radio" name="kategori_maklumat_Fb/Media_Sosial" value="Buletin MPKlang"> BULETIN MPKLANG </div>
        <div style="width:33%; text-align:left;"><input type="radio" name="kategori_maklumat_Fb/Media_Sosial" value="Perwartaan"> PERWARTAAN </div>

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
