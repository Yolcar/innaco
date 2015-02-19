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
    {{ HTML::style('css/dashboard.css') }}



    {{ HTML::script('js/html5shiv.min.js') }}
    {{ HTML::script('js/respond.min.js') }}
    {{ HTML::script('js/jquery-2.1.3.min.js') }}
    {{ HTML::script('bootstrap/js/bootstrap.min.js') }}
</head>

<body>
<!-- Begin page content -->
<div class="container-fluid">
    <div class="col-md-4 col-md-offset-4">
        <h3>Gestor de Documentos Innaco</h3>
        {{ Form::open(array('url' => 'login', 'method' => 'post')) }}
        {{Form::label('email','Email')}}
        {{Form::text('email', null,array('class' => 'form-control'))}}
        {{Form::label('password','Password')}}
        {{Form::password('password',array('class' => 'form-control'))}}
        <br>
        {{Form::submit('Login', array('class' => 'btn btn-primary'))}}
        {{ Form::close() }}
    </div>
</div>
</body>
</html>
