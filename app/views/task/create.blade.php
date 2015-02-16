@extends('layout')
@extends('sidebar')
@extends('navbar')

@section('body')

<h1 class="page-header">Crear Nueva Tarea</h1>

{{ Form::open(['route' => 'task.store', 'method' => 'POST', 'role' => 'form']) }}

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
    <a href="{{Route('task.index')}}" class="btn btn-custom-back" data-toggle="popover" data-content="Permite volver a la lista de las tareas creadas" data-original-title="Atras">Atras</a>
    <input type="submit" value="Crear" class="btn btn-custom-create" data-toggle="popover" data-content="Permite crear una nueva tarea" data-original-tittle="Crear" >
</p>

{{Form::close()}}

@endsection