@extends('layout')
@extends('sidebar')
@extends('navbar')

@section('body')
    <h1 class="page-header">Plantillas Desactivadas</h1>

    <h3>Se encontraron {{$templates->getTotal()}} plantillas desactivadas.</h3>

    @include('template.activeFilters')

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
                    {{ Form::open(['route' => ['templateActive',$template->id], 'method' => 'POST','role' => 'form']) }}
                    {{ Form::button('Activar', ['type' => 'submit', 'class' => 'btn btn-custom-active']) }}
                    {{ Form::close() }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$templates->links()}}
@endsection
