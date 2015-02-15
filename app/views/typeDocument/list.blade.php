@extends('layout')
@extends('sidebar')
@extends('navbar')

@section('body')
    <h1 class="page-header">Tipos de Documentos</h1>
<p>
    <a class="btn btn-custom-create" href="{{Route('type_document.create')}}">Crear Tipo</a>
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
                <td width="70%" class="name">{{$typeDocument->name}}</td>
                <td>
                    @if($typeDocument->template->count()> 0)
                        <a href="#" class="btn btn-custom-disable">Desactivar</a>
                    @else
                        {{ Form::open(['route' => ['type_document.destroy', $typeDocument->id ], 'method' => 'DELETE']) }}
                        {{ Form::button('Eliminar', ['type' => 'submit', 'class' => 'btn btn-custom-delete']) }}
                        {{ Form::close() }}
                    @endif
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
    {{$typeDocuments->links()}}
@endsection
