@extends('layout2')

@section('head')

<title>Edit Permohonan</title>

@endsection

@section('body')

<br>

<div style="padding-right:100px; padding-left:100px">

<br>

<div class="card" >

<h2 class="card-header">
@csrf

<div style="display:flex;">

<div style="width:5%;">
<a href="{{route('senarai.permohonan')}}" class="btn btn-primary btn-sm">Back</a>
</div>

<div style="width:95%;">
<center><b>Edit Borang Permohonan Kemaskini Aduan</b></center>
</div>

</div></h2>

<br><br>

<div style="word-wrap: break-word; margin-left:100px; margin-right:100px;
    border: 2px solid grey; padding-left:20px; padding-right:20px;">

        <br>
        <label style="padding-left:10px"><b>ULASAN PENYELIA: </b></label>  &nbsp; {{$id->ulasan_penyelia}}<br><br>
        <label style="padding-left:10px"><b>ULASAN PENGARAH: </b></label>  &nbsp; {{$id->ulasan_pengarah}}<br><br>

</div>


@if($errors->any())
<br>
<div>
	<ul style="padding-left:400px">
	
		@foreach($errors->all() as $error)
		
			<li style="color:red">{{$error}}</li>
		
		@endforeach
	
	</ul>
</div>
@endif

<form method="POST" action=" {{route('update.aduan')}} " enctype="multipart/form-data">

@csrf

<br>

<label style="padding-left:100px"><b>NAMA PENGADU: </b></label> &nbsp; {{$id->nama_pengadu}}
<input style="width:400px" type="hidden" name="nama_pengadu" value="{{$id->nama_pengadu}}"/><br><br>


<label style="padding-left:100px"><b>JABATAN/BAHAGIAN: </b></label> &nbsp; {{$id->jabatan}}
<input style="width:400px" type="hidden" name="jabatan" value="{{$id->jabatan}}"/>
<br><br>


<label style="padding-left:100px"><b>NO RUJUKAN: </b></label>
<input style="width:300px" type="text" name="no_rujukan" value="{{$id->no_rujukan}}" /><br><br>


<label style="padding-left:100px"><b>JENIS ADUAN: </b></label><br>

<div style="padding-left:100px">
<input type="radio" name="jenis_aduan" value="Maklumat Tidak Dikemaskini"
@php if(strpos($id->jenis_aduan, 'Maklumat Tidak Dikemaskini') !== false) { @endphp checked
@php } @endphp> MAKLUMAT TIDAK DIKEMASKINI <br>

<input type="radio" name="jenis_aduan" value="Modul Tidak Berfungsi"
@php if(strpos($id->jenis_aduan, 'Modul Tidak Berfungsi') !== false) { @endphp checked
@php } @endphp> MODUL TIDAK BERFUNGSI<br>

</div>

<br>

<label style="padding-left:100px"><b>KETERANGAN ADUAN: </b></label><br>
<div style="padding-left:100px" ><textarea style="width:600px; height:150px;" type="text" name="keterangan_aduan"
>{{$id->keterangan_aduan}}</textarea></div><br>

<br><label style="padding-left:100px"><b>MUAT NAIK GAMBAR/DOKUMEN: </b></label><br>

<div style="padding-left:100px; display:flex">
    <input style="width:50%;" type="file" name="zipdoc" value="" >
    <input style="width:50%;" type="file" name="zipdoc2" value="" >
    </div>

    <div style="padding-left:100px; display:flex">
    <div style="width:50%">@php if($id->zipdoc != null) { @endphpCurrent:{{$id->zipdoc}}<br>
    <a href="{{route('download.file',['num'=> '1','id'=>$id->id,'perkara'=>'aduan'])}}" class="btn btn-primary btn-sm">Muat Turun</a>
    <a href="{{route('delete.file',['num'=> '1','id'=>$id->id,'perkara'=>'aduan'])}}" onclick="return confirm('Adakah anda ingin membuang dokumen ini?')" class="btn btn-danger btn-sm">Buang</a>
    @php } @endphp</div>
    <div style="width:50%">@php if($id->zipdoc2 != null) { @endphpCurrent:{{$id->zipdoc2}}<br>
    <a href="{{route('download.file',['num'=> '2','id'=>$id->id,'perkara'=>'aduan'])}}" class="btn btn-primary btn-sm">Muat Turun</a>
    <a href="{{route('delete.file',['num'=> '2','id'=>$id->id,'perkara'=>'aduan'])}}" onclick="return confirm('Adakah anda ingin membuang dokumen ini?')" class="btn btn-danger btn-sm">Buang</a>
    @php } @endphp</div>
    </div><br>

    <div style="padding-left:100px; display:flex">
    <input style="width:50%;" type="file" name="zipdoc3" value="" >
    <input style="width:50%;" type="file" name="zipdoc4" value="" >
    </div>

    <div style="padding-left:100px; display:flex">
    <div style="width:50%">@php if($id->zipdoc3 != null) { @endphpCurrent:{{$id->zipdoc3}}<br>
    <a href="{{route('download.file',['num'=> '3','id'=>$id->id,'perkara'=>'aduan'])}}" class="btn btn-primary btn-sm">Muat Turun</a>
    <a href="{{route('delete.file',['num'=> '3','id'=>$id->id,'perkara'=>'aduan'])}}" onclick="return confirm('Adakah anda ingin membuang dokumen ini?')" class="btn btn-danger btn-sm">Buang</a>
    @php } @endphp</div>
    <div style="width:50%">@php if($id->zipdoc4 != null) { @endphpCurrent:{{$id->zipdoc4}}<br>
    <a href="{{route('download.file',['num'=> '4','id'=>$id->id,'perkara'=>'aduan'])}}" class="btn btn-primary btn-sm">Muat Turun</a>
    <a href="{{route('delete.file',['num'=> '4','id'=>$id->id,'perkara'=>'aduan'])}}" onclick="return confirm('Adakah anda ingin membuang dokumen ini?')" class="btn btn-danger btn-sm">Buang</a>
    @php } @endphp</div>
    </div><br>

    <div style="padding-left:100px; display:flex">
    <input style="width:50%;" type="file" name="zipdoc5" value="" >
    <input style="width:50%;" type="file" name="zipdoc6" value="" >
    </div>

    <div style="padding-left:100px; display:flex">
    <div style="width:50%">@php if($id->zipdoc5 != null) { @endphpCurrent:{{$id->zipdoc5}}<br>
    <a href="{{route('download.file',['num'=> '5','id'=>$id->id,'perkara'=>'aduan'])}}" class="btn btn-primary btn-sm">Muat Turun</a>
    <a href="{{route('delete.file',['num'=> '5','id'=>$id->id,'perkara'=>'aduan'])}}" onclick="return confirm('Adakah anda ingin membuang dokumen ini?')" class="btn btn-danger btn-sm">Buang</a>
    @php } @endphp</div>
    <div style="width:50%">@php if($id->zipdoc6 != null) { @endphpCurrent:{{$id->zipdoc6}}<br>
    <a href="{{route('download.file',['num'=> '6','id'=>$id->id,'perkara'=>'aduan'])}}" class="btn btn-primary btn-sm">Muat Turun</a>
    <a href="{{route('delete.file',['num'=> '6','id'=>$id->id,'perkara'=>'aduan'])}}" onclick="return confirm('Adakah anda ingin membuang dokumen ini?')" class="btn btn-danger btn-sm">Buang</a>
    @php } @endphp</div>
    </div>

<input type="hidden" name="id" value="{{$id->id}}" />

<br><div style="text-align:center"><button class="btn btn-success btn-sm" type="submit">RESUBMIT</button></div>
<br><br><br>

</form>

</div>

</div>

@endsection
