@extends('layout')
@extends('sidebar')
@extends('navbar')

@section('head')
    {{ HTML::script('ckeditor/ckeditor.js') }}
    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    {{ HTML::script('js/app.js') }}
@endsection

@section('body')

<h1 class="page-header">Crear Nuevo Documento</h1>

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

<div class="form-group">
    <a href="#" class="btn btn-success" data-toggle="modal" data-target="#basicModal">Tipo de Plantilla</a>
</div>

<div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Selecciona la Plantilla</h4>
            </div>
            <div class="modal-body">

                Realiza suma
                <input type="button" href="javascript:;" onclick="realizaProceso($('#search').val());return false;" value="Calcula"/>
                <br>
                <span id="resultado"></span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Seleccionar</button>
            </div>
        </div>
    </div>
</div>



    <div class="form-group">
        {{ Field::textarea('body','', ['class' => 'ckeditor']) }}
    </div>

<p>
    <input type="submit" value="Crear" class="btn btn-success">
</p>

{{Form::close()}}

@endsection