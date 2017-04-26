<!DOCTYPE html>
<html lang="en">
<head>
	<title>Task Manager - @yield('title')</title>
	<lin rel="icon" href="{{ URL::asset('favicon.ico') }}">
	<link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">
	<link href="{{ URL::asset('css/jquery-ui.min.css') }}" rel="stylesheet">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script type="text/javascript" src="{{ URL::asset('js/jquery-ui.min.js') }}"></script>
	<style media="screen">
		.ui-datepicker {
			font-size: 12px;
		}
	</style>
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

	<script type="text/javascript">
		(function($){

			$(document).ready(function(){

				$(".statusToggle").on("click", function(){

					var location = "http://" + window.location.hostname + ":" + window.location.port +  "/tasks/update/" + $(this).data("id");
					window.location.href = location;

				});

				$('.date-picker').datepicker({
                    dateFormat: 'yy-mm-dd',
                    autoSize: false
                });

			});


		})(jQuery)
	</script>
</body>
</html>
