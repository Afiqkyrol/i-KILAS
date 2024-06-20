@extends('layout2')

@section('head')

<title>User Details</title>

@endsection

@section('body')

<br>

<div style="padding-left:50px">
<a style="padding-left:25px; padding-right:25px;" href="{{route('useredit.jtmsearch')}}" class="btn btn-primary btn-sm">Back</a>
</div>

<br><br>

<div style="padding-right:180px; padding-left:180px;">

<div class="card" >

<center><h2 class="card-header">
<div style="display:flex;">

<div style="width:10%">
    <a style="text-align:center" href="{{route('useredit.edit',['id'=> $id -> id])}}" class="btn btn-primary btn-sm">Edit User Details</a>
</div>

<div style="width:80%">
    <h3 style="padding-top:10px;">{{$id->fullname}}</h3>
</div>

<div style="width:10%">
    <a style="text-align:right" href="{{route('useredit.delete',['id'=> $id -> id])}}" onclick="return confirm('Are you sure you want to delete this user?')" class="btn btn-danger btn-sm">Delete</a>
</div>

</div>
</h2></center><br>

<div class="card-body" >
<div style="display:flex; text-align:center;">

    <div style="width:50%">
        <h5><b>No.K/P</b></h5>
        <p>{{$id->nokp}}</p>
    </div>

    <div style="width:50%">
        <h5><b>Email</b></h5>
        <p>{{$id->email}}</p>
    </div>

 </div>

 <br><br>

 <div style="display:flex; text-align:center;">

    <div style="width:50%">
        <h5><b>Jabatan/Bahagian/Unit</b></h5>
        <p>{{$id->jabatan}}</p>
    </div>

    <div style="width:50%">
        <h5 style="color:green"><b>Pengguna</b></h5>
        <p>{{$id->jawatan}}</p>
    </div>

</div>
</div>

</div>

</div>

@endsection
