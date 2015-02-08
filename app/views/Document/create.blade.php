@extends('layout')
@extends('navbar')
@extends('sidebar')

@section('head')
    <script>
        $(function() {
            // setting up the datepicker
            $('.datepicker').datepicker({
                format: "dd/mm/yyyy",
                startDate: "now",
                todayBtn: "linked",
                language: "es",
                orientation: "top auto",
                autoclose: true
            });
        });
    </script>
@endsection
@section('body')

    <h1 class="page-header">Crear Nueva Plantilla</h1>


    {{ Form::open(['route' => 'document.store', 'method' => 'POST', 'role' => 'form']) }}

    <div class="form-group">
        {{Form::hidden('template_id',$template->id,['id' => 'template_id'])}}
    </div>
    <div class="col-lg-12">
        <div class="col-lg-6">
            {{ Field::input('text','name',null,['id' => 'name']) }}
        </div>
        <label>Fecha de Ejecucion</label>
        <div class=" col-lg-6 input-group date">
            <input type="text" class="form-control" readonly><span class="input-group-addon"><i data-provide="datepicker" class="glyphicon glyphicon-th datepicker"></i></span>
        </div>
    </div>
    <div class="col-lg-12">
        {{ Field::textarea('body',$template->body, ['class' => 'ckeditor']) }}
    </div>


    <p>
        <input type="submit" value="Crear" class="btn btn-success">
    </p>

    {{Form::close()}}

@endsection