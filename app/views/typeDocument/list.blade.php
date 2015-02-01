@extends('layout')
@extends('sidebar')
@extends('navbar')

@section('body')
    <h1 class="page-header">Tipos de Documentos</h1>
<p>
    <a class="btn btn-info" href="{{Route('type_document.create')}}">Crear Tipo</a>
</p>

    <h3>Se encontraron {{$typeDocuments->getTotal()}} Tipos de Documentos.</h3>

    @include('typeDocument.filters')

    <table class="table .table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($typeDocuments as $typeDocument)
            <tr>
                <td class="name">{{$typeDocument->name}}</td>
                <td>
                    {{ Form::open(['route' => ['type_document.destroy', $typeDocument->id ], 'method' => 'DELETE']) }}
                    <a class="btn btn-success" href="{{Route('type_document.edit', $typeDocument->id)}}">
                        Editar
                    </a>
                        {{ Form::button('Eliminar', ['type' => 'submit', 'class' => 'btn btn-danger']) }}
                    {{ Form::close() }}
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
    {{$typeDocuments->links()}}
@endsection
