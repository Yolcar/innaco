{{ Form::open(['route' => 'document.create', 'method' => 'GET']) }}

    {{ Form::text('search') }}
    {{ Form::button('Buscar',['type' => 'submit', 'class' => 'btn btn-custom-search','data-toggle'=>'popover','data-content'=>'Hace una búsqueda de las plantillas creadas','data-original-title'=>'Buscar'])  }}

{{Form::close()}}