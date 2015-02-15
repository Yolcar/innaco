@extends('layout')
@extends('sidebar')
@extends('navbar')

@section('head')
    {{ HTML::script('ckeditor/ckeditor.js') }}
@endsection

@section('body')
    {{ Form::model($document,['route' => ['workflow.update',$document->id,$workflow->id], 'method' => 'POST', 'role' => 'form']) }}

    <div class="form-group text-center">
        <h1>Informacion del documento</h1>
        <h1 class="page-header">{{$document->name}}</h1>
        <br>
        <div class="col-lg-12">
            {{$document->body}}
            <br>
            <br>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="col-lg-1"><a class="btn btn-custom-show" href="{{ Route('workflow.show', $document->id) }}">Volver</a></div>
        <div class="col-lg-4"></div>
        <div class="col-lg-1"><input class="btn btn-custom-create" type="submit" name="confirm" value="Confirmar"></div>
        <div class="col-lg-4"></div>
        <div class="col-lg-1"><input class="btn btn-custom-delete" type="submit" name="deny" value="Rechazar"></div>
    </div>

    {{Form::close()}}

@endsection
