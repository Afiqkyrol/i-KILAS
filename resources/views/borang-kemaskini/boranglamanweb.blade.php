@extends('layout')

@section('head')


<title>PERMOHONAN KEMASKINI LAMAN WEB</title>



@endsection

@section('body')


<div style="padding-left:50px">
<a style="padding-left:25px; padding-right:25px;" href="{{route('dashboard.dashboard')}}" class="btn btn-primary btn-sm">Back</a>
</div>



<br><br>
<center><h2>BORANG PERMOHONAN KEMASKINI LAMAN WEB</h2></center>

@if($errors->any())
<div>
	<ul style="padding-left:400px">
	
		@foreach($errors->all() as $error)
		
			<li style="color:red">{{$error}}</li>
		
		@endforeach
	
	</ul>
</div>
@endif

<form method="POST" action="{{ route('borang-kemaskini.storelamanweb') }}" enctype="multipart/form-data">
    @csrf

    <br><br>
    <label style="padding-left:350px">NAMA PEMOHON: </label>  &nbsp; {{$user->fullname}}
    <input style="width:400px" type="hidden" name="name" value="{{$user->fullname}}"/><br><br>


    <label style="padding-left:350px">JABATAN/BAHAGIAN: </label> &nbsp; {{$user->jabatan}}
    <input style="width:400px" type="hidden" name="jabatan" value="{{$user->jabatan}}"/>

    <br><br>


    <label style="padding-left:350px">KATEGORI SALURAN: </label><br>

    <div style="padding-left:350px">
    <input type="radio" name="kategori_saluran" value="Laman Web"> LAMAN WEB
    <input style="margin-left:30px" type="radio" name="kategori_saluran" value="Portal Akses"> PORTAL AKSES
    <input style="margin-left:30px" type="radio" name="kategori_saluran" value="Facebook"> FACEBOOK
    <input style="margin-left:50px" type="radio" name="kategori_saluran" value=""> LAIN-LAIN (NYATAKAN)
    <input type="text" name="kategori_saluran_lainlain" ><br><br>
    </div>


    <label style="padding-left:350px">MAKLUMAT PENGEMASKINIAN: </label><br>

    <div style="padding-left:350px">
    <input type="radio" name="maklumat_kemaskini" value="Maklumat Tahunan"> MAKLUMAT TAHUNAN
    <input style="margin-left:30px" type="radio" name="maklumat_kemaskini" value="Maklumat Rutin"> MAKLUMAT RUTIN <br><br>
    </div>


    <label style="padding-left:350px">JENIS PENGEMASKINIAN: </label><br>

    <div style="padding-left:350px">

        <input type="radio" name="jenis_kemaskini" value="Maklumat Baru"> MAKLUMAT BARU <br>
        <input type="radio" name="jenis_kemaskini" value="Pengemaskinian Maklumat"> PENGEMASKINIAN MAKLUMAT <br>
        <input type="radio" name="jenis_kemaskini" value="Ralat/Pembetulan"> RALAT/PEMBETULAN <br>

    </div><br>


    <label style="padding-left:350px">KATEGORI MAKLUMAT: </label><br>

    <div style="padding-left:350px">

        
        <input type="radio" name="kategori_maklumat" value="Pengumuman"> PENGUMUMAN
        <input style="margin-left:50px" type="radio" name="kategori_maklumat" value="Perkhidmatan"> PERKHIDMATAN
        <input style="margin-left:50px" type="radio" name="kategori_maklumat" value=""> LAIN-LAIN (NYATAKAN)
        <input type="text" name="kategori_maklumat_lainlain" ><br>
       

        <input  type="radio" name="kategori_maklumat" value="Foto/Video"> FOTO/VIDEO
        <input style="margin-left:70px" type="radio" name="kategori_maklumat" value="Banner/Poster"> BANNER/POSTER <br>

        <input  type="radio" name="kategori_maklumat" value="Jawatan Kosong"> JAWATAN KOSONG
        <input style="margin-left:24px" type="radio" name="kategori_maklumat" value="Aktiviti Semasa"> AKTIVITE SEMASA <br>

        <input  type="radio" name="kategori_maklumat" value="Sorotan Penting"> SOROTAN PENTING
        <input style="margin-left:22px" type="radio" name="kategori_maklumat" value="Iklan Tawaran"> IKLAN TAWARAN <br>
        
    </div>


    <br>
    <br>


    <label style="padding-left:350px">TAJUK MAKLUMAT: </label>
    <input style="width:400px" type="text" name="tajuk" value="{{ old('tajuk') }}"/><br><br>


    <label style="padding-left:350px">KETERANGAN: </label><br>
    <div style="padding-left:350px" ><textarea style="width:650px; height:150px;" type="text" name="keterangan"
    >{{ old('keterangan') }}</textarea></div><br>


    <label style="padding-left:350px">TARIKH PAPARAN: Dari</label>
    <input type="date" name="dateFrom" value="{{ old('dateFrom') }}">
    <label style="padding-left:10px">Hinga</label>
    <input type="date" name="dateUntil" value="{{ old('dateUntil') }}"><br>


    <br><label style="padding-left:350px">MUAT NAIK GAMBAR/DOKUMEN*(.zip): </label>
    <input type="file" name="zipdoc" value="" ><br>

     <br><label style="padding-left:350px">MUAT NAIK 1 GAMBAR DARI DOKUMEN DIATAS: </label>
    <input type="file" name="gambar" value="" ><br><br>

    <div style="text-align:right; padding-right:250px;"><button class="btn btn-success btn-sm" type="submit">SUBMIT</button></div>

    <br><br><br>
</form>

@endsection
