{{ Form::open(['route' => 'type_document.index', 'method' => 'GET']) }}

    {{ Form::text('search') }}
    {{ Form::button('Buscar',['type' => 'submit', 'class' => 'btn btn-primary']) }}

{{Form::close()}}