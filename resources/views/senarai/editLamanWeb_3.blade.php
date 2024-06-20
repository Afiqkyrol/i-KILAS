@extends('layout2')

@section('head')

<title>Edit Permohonan</title>

@endsection

@section('body')

<br><br>

<div style="padding-right:50px; padding-left:50px">

<div class="card" >

<h2 class="card-header">

<div style="display:flex;">

<div style="width:5%;">
<a href="{{route('senarai.editLamanWeb21',['id'=> $id -> id])}}" class="btn btn-primary btn-sm">Back</a>
</div>

<div style="width:95%;">
<center><b>Borang Permohonan Kemaskini Laman Web 3/3</b></center>
</div>

</div>

</h2>

<div class="card-body">

<form method="POST" action="{{route('senarai.saveedit',['id'=> $id -> id])}}" enctype="multipart/form-data">
    @csrf

    <br>

    <label style="padding-left:300px">TAJUK MAKLUMAT: </label>
    <input style="width:350px" type="text" name="tajuk" value="{{ $id->tajuk }}"/><br><br>


    <label style="padding-left:300px">KETERANGAN: </label><br>
    <div style="padding-left:300px" ><textarea style="width:650px; height:150px;" type="text" name="keterangan"
    >{{ $id->keterangan }}</textarea></div><br>

    <label style="padding-left:300px">TARIKH PAPARAN: Dari</label>
    <input type="date" name="dateFrom" value="{{ $id->from_date }}">
    <label style="padding-left:10px">Hinga</label>
    <input type="date" name="dateUntil" value="{{ $id->to_date }}"><br>

    <br><label style="padding-left:300px">MUAT NAIK GAMBAR/DOKUMEN:</label>

    <br>

    <div style="padding-left:300px; display:flex">
    <input style="width:50%;" type="file" name="zipdoc" value="" >
    <input style="width:50%;" type="file" name="zipdoc2" value="" >
    </div>

    <div style="padding-left:300px; display:flex">
    <div style="width:50%">@php if($id->zipdoc != null) { @endphpCurrent:{{$id->zipdoc}}<br>
    <a href="{{route('download.file',['num'=> '1','id'=>$id->id,'perkara'=>'lamanweb'])}}" class="btn btn-primary btn-sm">Muat Turun</a>
    <a href="{{route('delete.file',['num'=> '1','id'=>$id->id,'perkara'=>'kemaskini'])}}" onclick="return confirm('Adakah anda ingin membuang dokumen ini?')" class="btn btn-danger btn-sm">Buang</a>
    @php } @endphp</div>
    <div style="width:50%">@php if($id->zipdoc2 != null) { @endphpCurrent:{{$id->zipdoc2}}<br>
    <a href="{{route('download.file',['num'=> '2','id'=>$id->id,'perkara'=>'lamanweb'])}}" class="btn btn-primary btn-sm">Muat Turun</a>
    <a href="{{route('delete.file',['num'=> '2','id'=>$id->id,'perkara'=>'kemaskini'])}}" onclick="return confirm('Adakah anda ingin membuang dokumen ini?')" class="btn btn-danger btn-sm">Buang</a>
    @php } @endphp</div>
    </div><br>

    <div style="padding-left:300px; display:flex">
    <input style="width:50%;" type="file" name="zipdoc3" value="" >
    <input style="width:50%;" type="file" name="zipdoc4" value="" >
    </div>

    <div style="padding-left:300px; display:flex">
    <div style="width:50%">@php if($id->zipdoc3 != null) { @endphpCurrent:{{$id->zipdoc3}}<br>
    <a href="{{route('download.file',['num'=> '3','id'=>$id->id,'perkara'=>'lamanweb'])}}" class="btn btn-primary btn-sm">Muat Turun</a>
    <a href="{{route('delete.file',['num'=> '3','id'=>$id->id,'perkara'=>'kemaskini'])}}" onclick="return confirm('Adakah anda ingin membuang dokumen ini?')" class="btn btn-danger btn-sm">Buang</a>
    @php } @endphp</div>
    <div style="width:50%">@php if($id->zipdoc4 != null) { @endphpCurrent:{{$id->zipdoc4}}<br>
    <a href="{{route('download.file',['num'=> '4','id'=>$id->id,'perkara'=>'lamanweb'])}}" class="btn btn-primary btn-sm">Muat Turun</a>
    <a href="{{route('delete.file',['num'=> '4','id'=>$id->id,'perkara'=>'kemaskini'])}}" onclick="return confirm('Adakah anda ingin membuang dokumen ini?')" class="btn btn-danger btn-sm">Buang</a>
    @php } @endphp</div>
    </div><br>

    <div style="padding-left:300px; display:flex">
    <input style="width:50%;" type="file" name="zipdoc5" value="" >
    <input style="width:50%;" type="file" name="zipdoc6" value="" >
    </div>

    <div style="padding-left:300px; display:flex">
    <div style="width:50%">@php if($id->zipdoc5 != null) { @endphpCurrent:{{$id->zipdoc5}}<br>
    <a href="{{route('download.file',['num'=> '5','id'=>$id->id,'perkara'=>'lamanweb'])}}" class="btn btn-primary btn-sm">Muat Turun</a>
    <a href="{{route('delete.file',['num'=> '5','id'=>$id->id,'perkara'=>'kemaskini'])}}" onclick="return confirm('Adakah anda ingin membuang dokumen ini?')" class="btn btn-danger btn-sm">Buang</a>
    @php } @endphp</div>
    <div style="width:50%">@php if($id->zipdoc6 != null) { @endphpCurrent:{{$id->zipdoc6}}<br>
    <a href="{{route('download.file',['num'=> '6','id'=>$id->id,'perkara'=>'lamanweb'])}}" class="btn btn-primary btn-sm">Muat Turun</a>
    <a href="{{route('delete.file',['num'=> '6','id'=>$id->id,'perkara'=>'kemaskini'])}}" onclick="return confirm('Adakah anda ingin membuang dokumen ini?')" class="btn btn-danger btn-sm">Buang</a>
    @php } @endphp</div>
    </div>

    <br><hr>

    <div style="text-align:center;"><button class="btn btn-success btn-sm" type="submit">SUBMIT</button></div>


</form>

</div>

</div>

</div>

<br>
@endsection
