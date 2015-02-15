<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Dashboard Template for Bootstrap</title>

	{{ HTML::style('bootstrap/css/bootstrap.min.css') }}
	{{HTML::style('css/datepicker3.css')}}
	{{ HTML::style('css/dashboard.css') }}
    {{ HTML::style('css/button.css') }}


	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

	{{ HTML::script('js/jquery-2.1.3.min.js') }}
	{{ HTML::script('bootstrap/js/bootstrap.min.js') }}
	{{ HTML::script('ckeditor/ckeditor.js') }}
	{{ HTML::script('js/bootstrap-datepicker.js') }}
	{{ HTML::script('js/locales/bootstrap-datepicker.es.js') }}


	@yield('head')
</head>

<body>

@yield('navbar')

<div class="container-fluid">
	<div class="row">
		@yield('sidebar')
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			@yield('body')
		</div>
	</div></div>>
</body>
</html>
