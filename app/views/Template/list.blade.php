@extends('layout')
@extends('sidebar')
@extends('navbar')

@section('body')
    <h1 class="page-header">Plantillas</h1>
<p>
    <a class="btn btn-custom-create" href="{{Route('template.create')}}">Crear Plantillas</a>
    <a class="btn btn-custom-active" href="{{Route('activation')}}">Re-Activar</a>
</p>

    <h3>Se encontraron {{$templates->getTotal()}} Plantillas.</h3>

    @include('template.filters')

    <table class="table .table-hover">
        <thead>
            <tr>
                <th width="20%">Tipo Documento</th>
                <th width="40%">Nombre</th>
                <th width="40%">Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($templates as $template)
            <tr>
                <td>{{$template->typedocuments->name}}</td>
                <td class="name">{{$template->name}}</td>
                <td>
                    {{ Form::open(['route' => ['template.destroy', $template->id ], 'method' => 'DELETE']) }}
                    <a class="btn btn-custom-step" href="{{ Route('steps', $template->id) }}">
                        Asignar Pasos
                    </a>
                    <a class="btn btn-custom-show" href="{{ Route('template.show', $template->id) }}">
                        Mostrar
                    </a>
                    <a class="btn btn-custom-edit" href="{{Route('template.edit', $template->id)}}">
                        Editar
                    </a>
                    @if($template->document->count() > 0)
                        {{ Form::button('Desactivar', ['type' => 'submit', 'class' => 'btn btn-custom-disable']) }}
                    @else
                        {{ Form::button('Eliminar', ['type' => 'submit', 'class' => 'btn btn-custom-delete']) }}
                    @endif
                    {{ Form::close() }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$templates->links()}}
@endsection
