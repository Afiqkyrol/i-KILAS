@extends('temp')

@section('head')

<title>Forgot Password</title>

@endsection

@section('body')

<br>

<div style="padding-left:50px">
<a style="padding-left:25px; padding-right:25px;" href="{{route('login.index')}}" class="btn btn-primary btn-sm">Back</a>
</div>

<br><br><br><br><br>

<div style="padding-right:250px; padding-left:250px">

<div class="card" >


<center><h1 class="card-header">Forgot Password</h1></center><br>
<div class="card-body">
<form method="POST" action="{{route('forgotpassword.process')}}">

    @csrf


    <center>
    <label>Please enter your No.K/P to receive code to reset your password</label><br>
    <input type="text" name="no_kp" style="text-align:center" placeholder="e.g. 011101100011"/><br><br>
    <button class="btn btn-success btn-sm" type="submit">Submit</button>
    </center>

</form>

<br>

</div>

</div>

</div>
<br>

@if($errors->any())
<div>
	<ul style="padding-left:600px">
	
		@foreach($errors->all() as $error)
		
			<li style="color:red">{{$error}}</li>
		
		@endforeach
	
	</ul>
</div>
@endif

@endsection
