@extends('layout')
@extends('navbar')
@extends('sidebar')

@section('head')
    <script>
        $(function() {
            // setting up the datepicker
            $('.input-group.date').datepicker({
                format: "dd-mm-yyyy",
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
        {{Form::hidden('templates_id',$template->id,['id' => 'templates_id'])}}
    </div>
    <div class="col-lg-12">
        <div class="col-lg-6">
            {{ Field::input('text','name',null,['id' => 'name']) }}
        </div>
        <div class="input-group date">
            {{ Field::input('datepicker','execute_date',null,['readonly']) }}
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