@extends('layout')

@section('head')

<title>DASHBOARD</title>
<nav class="navbar navbar-dark bg-primary">

    <div style="color:white">i-KiLaS</div>

    <div style="color:white; padding-left:900px">MAJLIS PERBANDARAN KLANG</div>

    <div style="padding-left:10px; border-left: 2px solid white;">

        <a style="padding-left:25px; padding-right:25px;" href="{{route('logout')}}" class="btn btn-danger btn-sm">Logout</a>

    </div>

</nav>

@endsection

@section('body')

<div style="display:flex; background-color: #e9ecef;">

    <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px; height:580px">

        <h3>Tindakan</h3>

        <ul class="nav flex-column">
            <li style="padding-bottom:5px" class="nav-item">
                 <a style="width:250px;" class="btn btn-outline-primary" href="{{route('senarai.kemaskini')}}">KEMASKINI</a>
            </li>
        </ul>

        <div><hr></div>

        <h3>Selenggara</h3>

        <ul class="nav flex-column">
            <li style="padding-bottom:5px" class="nav-item">
                <a style="width:250px;" class="btn btn-outline-primary" href="{{route('senarai.maklumat')}}">SENARAI MAKLUMAT</a>
            </li>
        </ul>

    </div>

    <div style="width:1000px">

        <center><h1 style="padding-top:200px;">SELAMAT DATANG KE SISTEM i-KiLaS<br>MAJLIS PERBANDARAN KLANG</h1></center><br>

    </div>

</div>






@endsection
