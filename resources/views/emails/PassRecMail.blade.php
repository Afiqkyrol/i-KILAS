@extends('temp')

@section('head')



@endsection

@section('body')

    <h1>{{ $details['title'] }}</h1>
    <p>{{ $details['body'] }}<br>
    <h3 style="color:green"><b>{{ $details['code'] }}</b></h3></p>
   
    <p>Thank you</p>

@endsection

