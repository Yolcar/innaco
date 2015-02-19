@extends('layout')
@extends('sidebar')
@extends('navbar')

@section('body')
    <h1 class="page-header">Seleccione la plantillas que desea usar</h1>

    <h3>Se encontraron {{$templates->getTotal()}} Plantillas.</h3>

    @include('document.filtersTemplate')

    <table class="table table-striped table-hover">
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
                    {{ Form::button('Usar Plantilla', ['type' => 'submit', 'class' => 'btn btn-custom-step','data-toggle'=>'popover','data-content'=>'Asigna la Plantilla que usara el Documento','data-original-title'=>'Usar Plantilla']) }}
                    {{ Form::close() }}

                </td>


            </tr>

        @endforeach

        </tbody>
    </table>

    {{$templates->links()}}
    <a href="{{Route('document.index')}}" class="btn btn-custom-back" data-toggle="popover" data-content="Permite volver a la lista de los documentos creados" data-original-title="Atras">Atras</a>
@endsection
