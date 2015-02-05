@extends('layout')
@extends('sidebar')
@extends('navbar')

@section('head')
    <script>
        function asignarID(id,name){
            document.getElementById("typedocuments_id").value = id;
            document.getElementById("name").value = name;
        }
    </script>
@endsection

@section('body')

<h1 class="page-header">Crear Nueva Plantilla</h1>

@include('template.typeDocumentfilters')
<br>

{{ Form::open(['route' => 'template.store', 'method' => 'POST', 'role' => 'form']) }}

    <div class="form-group">
        {{Form::hidden('typedocuments_id',"",['id' => 'typedocuments_id'])}}
    </div>

    {{ Field::input('text','name',"",['id' => 'name']) }}
    {{ Field::textarea('body','', ['class' => 'ckeditor']) }}

<p>
    <input type="submit" value="Crear" class="btn btn-success">
</p>

{{Form::close()}}

@endsection