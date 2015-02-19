@extends('layout')
@extends('sidebar')
@extends('navbar')

@section('body')
    <h1 class="page-header">Tareas Desactivadas</h1>

    <h3>Se encontraron {{$groups->getTotal()}} Grupos Desactivados.</h3>

    @include('group.activeFilters')

    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th width="40%">Nombre</th>
            <th width="40%">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($groups as $group)
            <tr>
                <td class="name">{{$group->name}}</td>
                <td>
                    {{ Form::open(['route' => ['groupActive',$group->id], 'method' => 'POST','role' => 'form']) }}
                    {{ Form::button('Activar', ['type' => 'submit', 'class' => 'btn btn-custom-active','data-toggle'=>'popover','data-content'=>'Permite activar los grupos que fueron desactivadas','data-original-title'=>'Activar']) }}
                    {{ Form::close() }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$groups->links()}}
    <a href="{{Route('group.index')}}" class="btn btn-custom-back" data-toggle="popover" data-content="Permite volver a la lista de los grupos creados" data-original-title="Atras">Atras</a>
@endsection
