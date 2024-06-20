<!DOCTYPE html>
<html>
	<head>

        <script src="{{ asset('js/app.js') }}" defer></script>
		<link href="{{ asset('css/app.css') }}" rel="stylesheet">

        @yield('head')

    </head>

    <body>

        @yield('body')

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="{{ asset('js/bootstrap.min.js') }}"></script>

    </body>

</html>
