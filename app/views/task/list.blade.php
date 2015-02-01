@extends('layout')
@extends('sidebar')
@extends('navbar')

@section('body')
    <h1 class="page-header">Tareas</h1>
<p>
    <a class="btn btn-info" href="{{Route('task.create')}}">Crear Tarea</a>
</p>

    <h3>Se encontraron {{$tasks->getTotal()}} Tareas.</h3>

    @include('task.filters')

    <table class="table .table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($tasks as $task)
            <tr>
                <td class="name">{{$task->name}}</td>
                <td>
                    {{ Form::open(['route' => ['task.destroy', $task->id ], 'method' => 'DELETE']) }}
                    <a class="btn btn-success" href="{{Route('task.edit', $task->id)}}">
                        Editar
                    </a>
                        {{ Form::button('Eliminar', ['type' => 'submit', 'class' => 'btn btn-danger']) }}
                    {{ Form::close() }}
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
    {{$tasks->links()}}
@endsection
