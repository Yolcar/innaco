@extends('layout')
@extends('sidebar')
@extends('navbar')

@section('head')
    {{ HTML::script('ckeditor/ckeditor.js') }}
@endsection

@section('body')
    <h1 class="page-header">Editar Plantilla</h1>

    {{ Form::model($template,['route' => ['template.update',$template->id], 'method' => 'PUT', 'role' => 'form']) }}

    <div class="form-group">
        {{Form::hidden('typedocuments_id')}}
    </div>

    {{ Field::input('text','name') }}

    {{ Field::textarea('body',null) }}

    <p>
        <input type="submit" value="Modificar" class="btn btn-custom-edit">
    </p>

    {{Form::close()}}

@endsection
