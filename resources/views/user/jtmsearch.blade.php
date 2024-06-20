@extends('layout2')

@section('head')

<title>User Search</title>

@endsection

@section('body')

<br>

<div style="padding-left:50px">
<a style="padding-left:25px; padding-right:25px;" href="{{route('dashboard.dashboard')}}" class="btn btn-primary btn-sm">Back</a>
</div>

<br><br><br>

@if(session()->has('useraccess'))
	<center><p style='color:red'>{{ session()->get('useraccess') }}</p></center>
@endif

<div style="padding-right:200px; padding-left:200px">

<div class="card" >

<center><h1 class="card-header">Search User</h1></center><br>

<div class="card-body">
<form method="POST" action="{{route('useredit.getid')}}">

    @csrf
    
    <center>
    <label>Please enter No.K/P of the user you want to edit</label><br>
    <input type="text" name="no_kp" style="text-align:center" placeholder="e.g. 011101100011"/><br><br>
    <button class="btn btn-success btn-sm" type="submit">Search</button>
    </center>

</form>

<br>

</div>

</div>

</div>

<br>

@if($errors->any())
<div>
	<ul style="padding-left:580px">
	
		@foreach($errors->all() as $error)
		
			<li style="color:red">{{$error}}</li>
		
		@endforeach
	
	</ul>
</div>
@endif

@endsection
