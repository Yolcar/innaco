@extends('layout')
@extends('sidebar')
@extends('navbar')

@section('head')
    {{ HTML::script('ckeditor/ckeditor.js') }}
    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script>
        $("[type=button]").button();
        $("[type=button]").click(function(){
            $(this).button('toggle');
            if ($(this).text()==="Mostrar"){
                $(this).button('open');
            }
            else {
                $(this).button('reset');
            }
        });
    </script>
    <script>
        $(document).ready(function(){
            $("#dam_return a").click(function(){
                var value = $(this).html();
                var input = $('#dam');
                input.val(value);
            });
        });
    </script>
@endsection

@section('body')

<h1 class="page-header">Crear Nueva Plantilla</h1>

@include('template.typeDocumentfilters')
<br>

{{ Form::open(['route' => 'task.store', 'method' => 'POST', 'role' => 'form']) }}

    <div class="form-group">
        {{Form::text('typedocuments_id',"",['id' => 'dam'])}}
    </div>

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
        {{ Field::textarea('body','', ['class' => 'ckeditor']) }}
    </div>

<p>
    <input type="submit" value="Crear" class="btn btn-success">
</p>

{{Form::close()}}

@endsection