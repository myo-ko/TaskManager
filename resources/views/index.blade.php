<!DOCTYPE html>
<html lang="en">
<head>
	<title>TM - @yield('title')</title>
	<link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
	<div class="container">

		@include('shared.nav')

		<div class="main">
			<div class="milestones">
				@yield('milestones')
				@yield('content')
			</div>
			<div class="projects">
				@yield('projects')
			</div>

		</div>
	</div>

</body>
</html>
