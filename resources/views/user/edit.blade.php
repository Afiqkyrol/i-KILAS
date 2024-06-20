@extends('layout2')

@section('head')

<title>Edit User</title>

@endsection

@section('body')

<br>

<div style="padding-left:50px">
<a style="padding-left:25px; padding-right:25px;" href="{{route('useredit.userdetails',['id'=> $id])}}" class="btn btn-primary btn-sm">Back</a>
</div>

<br><br>

<div style="padding-right:280px; padding-left:280px">

<div class="card" >

<center><h3 class="card-header">{{$id->fullname}}</h3></center><br>

<div class="card-body">

@if($errors->any())
<div>
	<ul style="padding-left:250px">
	
		@foreach($errors->all() as $error)
		
			<li style="color:red">{{$error}}</li>
		
		@endforeach
	
	</ul>
</div>
@endif

<form method="POST" action="{{route('useredit.save',['id'=> $id])}}">

    @csrf

    <div class="input-group mb-3">
    <span class="input-group-text">Nama Penuh</span>
    <input type="text" name="nama" class="form-control" value="{{$id->fullname}}">
    </div>

    <div class="input-group mb-3">
    <span class="input-group-text">No Kad Pengenalan</span>
    <input type="text" name="no_kp" class="form-control" value="{{$id->nokp}}">
    </div>

    <div class="input-group mb-3">
    <span class="input-group-text">Alamat Email</span>
    <input type="text" name="email" class="form-control" value="{{$id->email}}">
    </div>

    <div style="display:flex; text-align:center;">

    <div style="width:50%; text-align:left;">
    <label>Jantina:&nbsp;</label>
    <select style="width:150px" name="jantina">
        @php if($id->jantina == "lelaki"){ @endphp
        <option value="lelaki">Lelaki</option>
        <option value="perempuan">Perempuan</option>
        @php }else{ @endphp
        <option value="perempuan">Perempuan</option>
        <option value="lelaki">Lelaki</option>
        @php } @endphp
    </select>
    </div>

    <div style="width:50%; text-align:left;">
    <label>Pengguna sebagai:&nbsp;</label>
    <select style="width:150px" name="pengguna">
        @php if($id->jawatan == "pengarah"){ @endphp
        <option value="pengesah">Pengesah</option>
        <option value="penyemak">Penyemak</option>
        <option value="pemohon">Pemohon</option>
        @php }else if($id->jawatan == "penyelia"){ @endphp
        <option value="penyemak">Penyemak</option>
        <option value="pemohon">Pemohon</option>
        <option value="pengesah">Pengesah</option>
        @php }else{ @endphp
        <option value="pemohon">Pemohon</option>
        <option value="penyemak">Penyemak</option>
        <option value="pengesah">Pengesah</option>
        @php } @endphp
    </select>
    </div>

    </div>

    <br><center>
    <button class="btn btn-success btn-sm" type="submit">Simpan</button>
    </center>

</form>

<br>

</div>

</div>

</div>

@endsection
