@extends('temp')

@section('head')

<title>Reset Password</title>

@endsection

@section('body')

<br><br><br><br><br><br><br>

@if($errors->any())
<div>
	<ul style="padding-left:600px">
	
		@foreach($errors->all() as $error)
		
			<li style="color:red">{{$error}}</li>
		
		@endforeach
	
	</ul>
</div>
@endif

<div style="padding-right:250px; padding-left:250px">

<div class="card" >

<center>

    <h1 class="card-header" >Reset Password</h1>

    <div class="card-body">

    <form method="POST" action="{{route('password.reset')}}">

        @csrf

        <label style="padding-left:20px">New Password: </label>
        <input type="password" name="password" id="shwpass"/><br>

        <label>Confirm Password: </label>
        <input type="password" name="password_confirmation" id="showpass"/><br>

        <div style="padding-left:70px">
        <input type="checkbox" onclick="shwPass();showPass();">&nbsp;Show Password<br>
        </div>

        <p style="color:#468faf">Must contain at least one: lowercase letter,<br>uppercase letter,digit,symbol</p>

        <a href="{{route('login.index')}}" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Cancel</a>
        <button class="btn btn-success btn-sm" type="submit">Save</button>

    </form>

    </div>

</center>

</div>

</div>

@endsection
