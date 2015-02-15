<div class="col-sm-3 col-md-2 sidebar">
    <ul class="nav">
        @if(Route::getCurrentRoute()->getPath()=='/')
            <li role="presentation" class="active"><a href="{{ route('home') }}">Home</a></li>
        @else
            <li role="presentation"><a href="{{ route('home') }}">Home</a></li>
        @endif
            {{--Tipo de Documento--}}
            <li role="presentation"><a href="{{ route('task.index') }}">Tareas</a></li>
            <li role="presentation"><a href="{{ route('template.index') }}">Plantillas</a></li>
            <li role="presentation"><a href="{{ route('document.index') }}">Documentos</a></li>
            <li role="presentation"><a href="{{ route('type_document.index') }}">Tipo de Documento</a></li>
    </ul>
</div>