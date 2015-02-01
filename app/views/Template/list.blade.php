@extends('layout')
@extends('sidebar')
@extends('navbar')

@section('body')
    <h1 class="page-header">Plantillas</h1>
<p>
    <a class="btn btn-info" href="{{Route('template.create')}}">Crear Plantillas</a>
</p>

    <h3>Se encontraron {{$templates->getTotal()}} Plantillas.</h3>

    @include('template.filters')

    <table class="table .table-hover">
        <thead>
            <tr>
                <th width="30%">Tipo Documento</th>
                <th width="40%">Nombre</th>
                <th width="30%">Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($templates as $template)
            <tr>
                <td>{{$template->typedocuments->name}}</td>
                <td class="name">{{$template->name}}</td>
                <td>
                    {{ Form::open(['route' => ['template.destroy', $template->id ], 'method' => 'DELETE']) }}
                    <a class="btn btn-success" href="{{Route('template.edit', $template->id)}}">
                        Editar
                    </a>
                        {{ Form::button('Eliminar', ['type' => 'submit', 'class' => 'btn btn-danger']) }}
                    {{ Form::close() }}
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
    {{$templates->links()}}
@endsection
