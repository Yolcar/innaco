@extends('layout')
@extends('sidebar')
@extends('navbar')

@section('body')

<h1 class="page-header">Crear Nuevo Tipo de Documento</h1>

{{ Form::open(['route' => 'type_document.store', 'method' => 'POST', 'role' => 'form']) }}

    <div class="form-group">
        {{Form::label('name','Nombre')}}
        {{Form::text('name')}}

        @if($errors->has())
            @foreach ($errors->all() as $error)
                <div class="error_message">{{ $error }}</div>
            @endforeach
        @endif

    </div>

<p>
    <input type="submit" value="Crear" class="btn btn-success">
</p>

{{Form::close()}}

@endsection