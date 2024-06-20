@extends('layout2')

@section('head')

<title>Borang Permohonan Kemaskini Laman Web</title>

@endsection

@section('body')

<br><br>

<div style="padding-right:50px; padding-left:50px">

<div class="card" >

<h2 class="card-header">

<div style="display:flex;">

<div style="width:5%;">
<a href="{{route('borang.lamanweb21')}}" class="btn btn-primary btn-sm">Back</a>
</div>

<div style="width:95%;">
<center><b>Borang Permohonan Kemaskini Laman Web 3/3</b></center>
</div>

</div>

</h2>

<div class="card-body">

<div style="display:flex">
<div style="width:20%"></div>
<div style="width:80%">

<form method="POST" action="{{route('lamanweb.save')}}" enctype="multipart/form-data">
    @csrf

    <br>

    <label style="">TAJUK MAKLUMAT: </label>
    <input style="width:350px" type="text" name="tajuk" value="{{ old('tajuk') }}"/><br><br>


    <label style="">KETERANGAN: </label><br>
    <div style="" ><textarea style="width:650px; height:150px;" type="text" name="keterangan"
    >{{ old('keterangan') }}</textarea></div><br>

    <label style="">TARIKH PAPARAN: Dari</label>
    <input type="date" name="dateFrom" value="{{ old('dateFrom') }}">
    <label style="padding-left:10px">Hinga</label>
    <input type="date" name="dateUntil" value="{{ old('dateUntil') }}"><br>

    <br><label style="">MUAT NAIK GAMBAR/DOKUMEN: </label><br>
    <div style=""><input type="file" name="zipdoc" value="" ><input type="file" name="zipdoc2" value="" ></div><br>
    <div style=""><input type="file" name="zipdoc3" value="" ><input type="file" name="zipdoc4" value="" ></div><br>
    <div style=""><input type="file" name="zipdoc5" value="" ><input type="file" name="zipdoc6" value="" ></div><br>

    </div>
    </div>

    <div style="text-align:center;"><button class="btn btn-success btn-sm" type="submit">SUBMIT</button></div>

    <br>

</form>

</div>

</div>

</div>

@endsection
