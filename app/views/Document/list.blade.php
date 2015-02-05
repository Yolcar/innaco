@extends('layout')
@extends('sidebar')
@extends('navbar')

@section('body')
    <h1 class="page-header">Documento</h1>
<p>
    <a class="btn btn-info" href="{{ Route('document.create') }}">Crear Documento</a>
</p>

    <h3>Se encontraron {{$documents->getTotal()}} Documentos.</h3>

    @include('document.filters')

    <table class="table .table-hover">
        <thead>
            <tr>
                <th width="30%">Tipo Plantilla</th>
                <th width="40%">Nombre</th>
                <th width="30%">Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($documents as $document)
            <tr>
                <td>{{$document->template->name}}</td>
                <td class="name">{{$document->name}}</td>
                <td>
                    {{ Form::open(['route' => ['document.destroy', $document->id ], 'method' => 'DELETE']) }}
                    <a class="btn btn-success" href="{{Route('document.edit', $document->id)}}">
                        Editar
                    </a>
                        {{ Form::button('Eliminar', ['type' => 'submit', 'class' => 'btn btn-danger']) }}
                    {{ Form::close() }}
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
    {{$documents->links()}}
@endsection
