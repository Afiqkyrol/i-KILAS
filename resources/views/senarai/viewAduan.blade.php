@extends('layout2')

@section('head')

<title>VIEW PERMOHONAN KEMASKINI ADUAN</title>

@endsection

@section('body')



<br>

@php

if($_SESSION["page"] == "senarai_maklumat") { @endphp

    <div style="padding-left:50px">
        <a style="padding-left:25px; padding-right:25px;" href="{{route('senarai.maklumat')}}" class="btn btn-primary btn-sm">Back</a>
    </div>

@php
}else if($_SESSION["page"] == "senarai_jabatan"){
@endphp

<div style="padding-left:50px">
<a style="padding-left:25px; padding-right:25px;" href="{{route('senarai.permohonanJabatan')}}" class="btn btn-primary btn-sm">Back</a>
</div>


@php }else{ @endphp
<div style="padding-left:50px">
<a style="padding-left:25px; padding-right:25px;" href="{{route('senarai.permohonan')}}" class="btn btn-primary btn-sm">Back</a>
</div>

@php
}
@endphp

<br>

<div style="padding-right:50px; padding-left:50px;">

<div class="card" >

<center><h2 class="card-header">BORANG PERMOHONAN KEMASKINI ADUAN JABATAN</h2></center>

<div class="card-body">

<div style="display:flex">
<div style="width:20%"></div>
<div style="width:80%">

<br><br>

<div style="word-wrap: break-word; width:80%; border: 2px solid grey; padding-left:20px; padding-right:20px;">

        <br>
        <label style="padding-left:10px"><b>ULASAN PENYELIA: </b></label>  &nbsp; {{$id->ulasan_penyelia}}<br><br>
        <label style="padding-left:10px"><b>ULASAN PENGARAH: </b></label>  &nbsp; {{$id->ulasan_pengarah}}<br><br>

</div>



<br>
<br>

<label style=""><b>NAMA PENGADU: </b></label> &nbsp; {{$id->nama_pengadu}}
<br><br>


<label style=""><b>JABATAN/BAHAGIAN: </b></label> &nbsp; {{$id->jabatan}}
<br><br>


<label style=""><b>NO RUJUKAN: </b></label> &nbsp; {{$id->no_rujukan}}
<br><br>


<label style=""><b>JENIS ADUAN: </b></label> &nbsp; {{$id->jenis_aduan}}
<br><br>


<label style=""><b>KETERANGAN ADUAN: </b></label>
<div style="word-wrap: break-word; margin-right:100px;"
    >@php echo nl2br($id->keterangan_aduan); @endphp</div>
<br>

<br>

<div style="display:flex">
<div style="width:70%">
    @php
        if($id->zipdoc != ""){

    @endphp
    <label style=""><b>DOKUMEN: </b></label> &nbsp; {{$id->zipdoc}}
    @php
        }
    @endphp
</div>
<div style="width:30%">
    @php
        if($id->zipdoc != ""){

    @endphp
    <a href="{{route('download.file',['num'=> '1','id'=>$id->id,'perkara'=>'aduan'])}}" class="btn btn-primary btn-sm">Muat Turun</a>
    @php
        }
    @endphp
    <br>
</div>
</div>

<div style="display:flex">
<div style="width:70%">
    @php
        if($id->zipdoc2 != ""){

    @endphp
    <label style=""><b>DOKUMEN: </b></label> &nbsp; {{$id->zipdoc2}}
    @php
        }
    @endphp
</div>
<div style="width:30%">
    @php
        if($id->zipdoc2 != ""){

    @endphp
    <a href="{{route('download.file',['num'=> '2','id'=>$id->id,'perkara'=>'aduan'])}}" class="btn btn-primary btn-sm">Muat Turun</a>
    @php
        }
    @endphp
    <br>
</div>
</div>

<div style="display:flex">
<div style="width:70%">
    @php
        if($id->zipdoc3 != ""){

    @endphp
    <label style=""><b>DOKUMEN: </b></label> &nbsp; {{$id->zipdoc3}}
    @php
        }
    @endphp
</div>
<div style="width:30%">
    @php
        if($id->zipdoc3 != ""){

    @endphp
    <a href="{{route('download.file',['num'=> '3','id'=>$id->id,'perkara'=>'aduan'])}}" class="btn btn-primary btn-sm">Muat Turun</a>
    @php
        }
    @endphp
    <br>
</div>
</div>

<div style="display:flex">
<div style="width:70%">
    @php
        if($id->zipdoc4 != ""){

    @endphp
    <label style=""><b>DOKUMEN: </b></label> &nbsp; {{$id->zipdoc4}}
    @php
        }
    @endphp
</div>
<div style="width:30%">
    @php
        if($id->zipdoc4 != ""){

    @endphp
    <a href="{{route('download.file',['num'=> '4','id'=>$id->id,'perkara'=>'aduan'])}}" class="btn btn-primary btn-sm">Muat Turun</a>
    @php
        }
    @endphp
    <br>
</div>
</div>

<div style="display:flex">
<div style="width:70%">
    @php
        if($id->zipdoc5 != ""){

    @endphp
    <label style=""><b>DOKUMEN: </b></label> &nbsp; {{$id->zipdoc5}}
    @php
        }
    @endphp
</div>
<div style="width:30%">
    @php
        if($id->zipdoc5 != ""){

    @endphp
    <a href="{{route('download.file',['num'=> '5','id'=>$id->id,'perkara'=>'aduan'])}}" class="btn btn-primary btn-sm">Muat Turun</a>
    @php
        }
    @endphp
    <br>
</div>
</div>

<div style="display:flex">
<div style="width:70%">
    @php
        if($id->zipdoc6 != ""){

    @endphp
    <label style=""><b>DOKUMEN: </b></label> &nbsp; {{$id->zipdoc6}}
    @php
        }
    @endphp
</div>
<div style="width:30%">
    @php
        if($id->zipdoc6 != ""){

    @endphp
    <a href="{{route('download.file',['num'=> '6','id'=>$id->id,'perkara'=>'aduan'])}}" class="btn btn-primary btn-sm">Muat Turun</a>
    @php
        }
    @endphp
    <br>
</div>
</div>

</div>

</div>

</div>

</div>

</div>

</div>

<br><br>

@endsection
