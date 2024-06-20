@extends('layout2')

@section('head')

<title>Edit Profile</title>

@endsection

@section('body')

<br>


<br><br>

<div style="padding-right:180px; padding-left:180px;">

@if($errors->any())
<div>
	<ul style="padding-left:350px">
	
		@foreach($errors->all() as $error)
		
			<li style="color:red">{{$error}}</li>
		
		@endforeach
	
	</ul>
</div>
@endif

<form method="POST" action="">
@csrf

<div class="card" >

<h2 class="card-header">

<div style="display:flex;">

<div style="width:5%;">
<a href="{{route('profile.view')}}" class="btn btn-primary btn-sm">
<ion-icon style="font-size:16px" name="arrow-back-outline"></a>
</div>

<div style="width:90%;">
<center>Edit Profile</center>
</div>

<div style="width:5%;">
<button class="btn btn-success btn-sm" onclick="return confirm('save change?')" type="submit">
<ion-icon style="font-size:16px" name="save-outline"></ion-icon></button>
</div>

</div></h2>

<div class="card-body" >

<div class="input-group mb-3">
    <span class="input-group-text">No Telefon</span>
    <input type="text" name="no_telefon" class="form-control" value="{{$user->no_telefon}}">
</div>

<br>

<div class="input-group mb-3">
    <span class="input-group-text" id="basic-addon1">Jabatan/Bahagian/Unit</span>
    <input style="height:45px" class="form-control" list="list_jabatan" name="jabatan" value="{{$user->jabatan}}"/><br>
	<datalist id="list_jabatan">
			   <option value ="JABATAN KHIDMAT PENGURUSAN">JABATAN KHIDMAT PENGURUSAN
			   <option value ="JABATAN KEWANGAN">JABATAN KEWANGAN
			   <option value ="JABATAN KEJURUTERAAN">JABATAN KEJURUTERAAN
			   <option value ="JABATAN PERANCANG BANDAR DAN DESA">JABATAN PERANCANG BANDAR DAN DESA
			   <option value ="JABATAN BANGUNAN">JABATAN BANGUNAN
			   <option value ="JABATAN PENILAIAN">JABATAN PENILAIAN
			   <option value ="JABATAN PENGURUSAN HARTA">JABATAN PENGURUSAN HARTA
			   <option value ="JABATAN UNDANG-UNDANG">JABATAN UNDANG-UNDANG
			   <option value ="JABATAN KEMASYARAKATAN">JABATAN KEMASYARAKATAN
			   <option value ="JABATAN KESIHATAN">JABATAN KESIHATAN
			   <option value ="JABATAN PENGUATKUASA">JABATAN PENGUATKUASA
			   <option value ="JABATAN PELESENAN">JABATAN PELESENAN
               <option value ="JABATAN PENGURUSAN PASAR & PENJAJA">JABATAN PENGURUSAN PASAR & PENJAJA
               <option value ="JABATAN TAMAN DAN REKREASI">JABATAN TAMAN DAN REKREASI
               <option value ="JABATAN KOMUNIKASI KORPORAT">JABATAN KOMUNIKASI KORPORAT
               <option value ="JABATAN TEKNOLOGI MAKLUMAT">JABATAN TEKNOLOGI MAKLUMAT
               <option value ="JABATAN PERKHIDMATAN PERSEKITARAN">JABATAN PERKHIDMATAN PERSEKITARAN
               <option value ="JABATAN PUSAT SETEMPAT (OSC )">JABATAN PUSAT SETEMPAT (OSC )
               <option value ="JABATAN PESURUHJAYA BANGUNAN (COB)">JABATAN PESURUHJAYA BANGUNAN (COB)
               <option value ="BAHAGIAN AUDIT DALAM">BAHAGIAN AUDIT DALAM
               <option value ="BAHAGIAN UKUR BAHAN">BAHAGIAN UKUR BAHAN
               <option value ="UNIT PENYAMPAIAN PERKHIDMATAN (SDU)">UNIT PENYAMPAIAN PERKHIDMATAN (SDU)
               <option value ="UNIT INTEGRITI">UNIT INTEGRITI
	</datalist><br>
</div>

</form>

</div></center>

</div>

</div>



@endsection
