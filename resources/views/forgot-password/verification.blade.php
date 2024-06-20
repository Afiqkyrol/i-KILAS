@extends('temp')

@section('head')



@endsection

@section('body')

<br><br><br><br><br><br>



<div style="padding-right:250px; padding-left:250px">

<div class="card" >

<center>

    <h1 class="card-header" style="color:green">Check your email</h1>

    <div class="card-body">

    @if(session()->has('code'))
	    <center><p style='color:red'>{{ session()->get('code') }}</p></center>
    @endif

    <p>Code to reset your password has been sent to<br>
    <b>@php  echo $_SESSION["fp_email"]; @endphp</b></p>

    <form method="POST" action="{{route('mail.verificationProcess')}}">

        @csrf

        <input type="text" name="code" style="text-align:center" placeholder="Enter the code here" ><br><br>

        <a style="padding-left:25px; padding-right:25px;" href="{{route('login.index')}}" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Cancel</a>
        &nbsp;<button class="btn btn-success btn-sm" type="submit">Continue</button>

    </form>

    </div>

</center>

</div>

</div>

<div>
	<ul style="padding-left:600px">
	
		@foreach($errors->all() as $error)
		
			<li style="color:red">{{$error}}</li>
		
		@endforeach
	
	</ul>
</div>


@endsection
