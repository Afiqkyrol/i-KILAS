@extends('layout2')

@section('head')

<title>My Profil</title>

@endsection

@section('body')

<br><br>

<div style="padding-right:180px; padding-left:180px;">

<div class="card" >

<center><h2 class="card-header">
<div style="display:flex;">

<div style="width:10%">
    <a style="text-align:center;" href="{{route('dashboard.dashboard')}}" class="btn btn-primary btn-sm">
    <ion-icon style="font-size:16px" name="arrow-back-outline"></ion-icon></a>
</div>

<div style="width:80%">
    <h3 style="padding-top:10px;">{{$user->fullname}}</h3>
</div>

<div style="width:10%">
    <a style="text-align:center; width:50px;" href="{{route('profile.edit')}}"  class="btn btn-primary btn-sm">
    <ion-icon style="font-size:16px" name="create-outline"></ion-icon></a>
</div>

</div>
</h2></center><br>

<div class="card-body" >
<div style="display:flex; text-align:center;">

    <div style="width:50%">
        <h5><b>No.K/P</b></h5>
        <p>{{$user->nokp}}</p>
    </div>

    <div style="width:50%">
        <h5><b>Email</b></h5>
        <p>{{$user->email}}</p>
    </div>

 </div>

 <br><br>

 <div style="display:flex; text-align:center;">

    <div style="width:50%">
        <h5><b>Jabatan/Bahagian/Unit</b></h5>
        <p>{{$user->jabatan}}</p>
    </div>

    <div style="width:50%">
        <h5><b>No Telefon</b></h5>
        <p>{{$user->no_telefon}}</p>
    </div>

</div>

<br><br>

<div style="display:flex; text-align:center;">

    <div style="width:50%">
        <h5><b>Jantina</b></h5>
        <p>{{$user->jantina}}</p>
    </div>

    <div style="width:50%">
        <h5><b>Pengguna</b></h5>
        <p>{{$user->jawatan}}</p>
    </div>

</div>


</div>

</div>

</div>

@endsection
