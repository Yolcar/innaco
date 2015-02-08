@extends('layout')
@extends('sidebar')
@extends('navbar')

@section('body')
    <h1 class="page-header">Seleccione la plantillas que desea usar</h1>

    <h3>Se encontraron {{$templates->getTotal()}} Plantillas.</h3>

    @include('document.filtersTemplate')

    <table class="table .table-hover">
        <thead>
        <tr>
            <th width="20%">Tipo Documento</th>
            <th width="40%">Nombre Plantilla</th>
            <th width="40%"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($templates as $template)
            <tr>
                <td>{{$template->typedocuments->name}}</td>
                <td class="name">{{$template->name}}</td>
                <td>
                    {{ Form::open(['route' => ['write', $template->id ], 'method' => 'GET']) }}
                    {{ Form::button('Usar Plantilla', ['type' => 'submit', 'class' => 'btn btn-success']) }}
                    {{ Form::close() }}
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
    {{$templates->links()}}
@endsection
