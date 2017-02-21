<!DOCTYPE html>
<html lang="en">
<head>
	<title>Task Manager</title>
	<link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
	<div class="container">

		@include('shared.nav')

		<div class="main">

			@yield('content')

		</div>
	</div>
</body>
</html>
