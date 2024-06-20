@extends('layout2')

@section('head')

<title>Edit Permohonan</title>





@endsection

@section('body')

<br>

<div style="padding-right:50px; padding-left:50px">

<br>

<div class="card" >



<form method="POST" action="{{route('senarai.editLamanWeb2',['id'=> $id -> id])}}">

<h2 class="card-header">
@csrf

<div style="display:flex;">

<div style="width:5%;">
<a href="{{route('senarai.permohonan')}}" class="btn btn-primary btn-sm">Back</a>
</div>

<div style="width:95%;">
<center><b>Borang Permohonan Kemaskini Laman Web 1/3</b></center>
</div>

</div></h2>

<div class="card-body">

<div style="word-wrap: break-word; margin-left:350px; margin-right:350px;
    border: 2px solid grey; padding-left:20px; padding-right:20px;">

        <br>
        <label style="padding-left:10px"><b>ULASAN PENYELIA: </b></label>  &nbsp; {{$id->ulasan_penyelia}}<br><br>
        <label style="padding-left:10px"><b>ULASAN PENGARAH: </b></label>  &nbsp; {{$id->ulasan_pengarah}}<br><br>
</div>

    @if($errors->any())
    <div style="padding-left:300px">
	    <ul>
	
		    @foreach($errors->all() as $error)
		
			    <li style="color:red">{{$error}}</li>
		
		    @endforeach
	
	    </ul>
    </div>
    @endif


    @if(session()->has('form'))
	    <center><p style='color:red'>{{ session()->get('form') }}</p></center>
    @endif

    <br>
    <label style="padding-left:300px"><b>NAMA PEMOHON: </b></label>  &nbsp; {{$id->name}}
    <input style="width:400px" type="hidden" name="name" value="{{$id->name}}"/><br><br><br>


    <label style="padding-left:300px"><b>JABATAN/BAHAGIAN/UNIT: </b></label> &nbsp; {{$id->jabatan}}
    <input style="width:400px" type="hidden" name="jabatan" value="{{$id->jabatan}}"/><br><br><br>

    <label style="padding-left:300px"><b>KATEGORI SALURAN: </b></label><br><br>

    <div style="padding-left:300px">
    <input type="checkbox" name="kategori_saluran1" value="Laman Web"
    @php if(strpos($_SESSION['kategori_saluran'], 'Laman Web') !== false && $_SESSION['check_laman_web_1'] == "true") { @endphp checked @php } @endphp
    @php if(strpos($id->kategori_saluran, 'Laman Web') !== false && $_SESSION['check_laman_web_1'] != "true") { @endphp checked @php } @endphp
    > LAMAN WEB


    <input style="margin-left:30px" type="checkbox" name="kategori_saluran2" value="Portal Akses"
    @php if(strpos($_SESSION['kategori_saluran'], 'Portal Akses') !== false && $_SESSION['check_laman_web_1'] == "true") { @endphp checked @php } @endphp
    @php if(strpos($id->kategori_saluran, 'Portal Akses') !== false && $_SESSION['check_laman_web_1'] != "true") { @endphp checked @php } @endphp
    > PORTAL AKSES


    <input style="margin-left:30px" type="checkbox" name="kategori_saluran3" value="Facebook"
    @php if(strpos($_SESSION['kategori_saluran'], 'Facebook') !== false && $_SESSION['check_laman_web_1'] == "true") { @endphp checked @php } @endphp
    @php if(strpos($id->kategori_saluran, 'Facebook') !== false && $_SESSION['check_laman_web_1'] != "true") { @endphp checked @php } @endphp
    > FACEBOOK


    <input style="margin-left:30px" type="checkbox" name="kategori_saluran_lain-lain" value="lainlain"
    @php if(strpos($id->kategori_saluran, 'lainlain') !== false) { @endphp checked
    @php } @endphp> LAIN-LAIN (NYATAKAN)


    <input type="text" name="kategori_saluran_ruangan" ><br><br><br>
    </div>

    <center><button style="padding-left:25px; padding-right:25px;" class="btn btn-success btn-sm" type="submit">Next</button></center>

</form>
</div>

</div>

</div>

@endsection
