@extends('layout')
@extends('sidebar')
@extends('navbar')

@section('body')
    <script>
        $('#confirm').click(function(event){
            event.preventDefault();
            var id = $(this).data('id');
            // console.log(id);
            // pass id to appropriate element here
            $(".modal-header #id").val(id);
        });
    </script>

    <h1 class="page-header">Tareas</h1>
<p>
    <a class="btn btn-custom-create" href="{{Route('task.create')}}">Crear Tarea</a>
</p>

    <h3>Se encontraron {{$tasks->getTotal()}} Tareas.</h3>

    @include('task.filters')

    <table class="table .table-hover">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($tasks as $task)
            <tr>
                <td class="name">{{$task->name}}</td>
                <td>
                    @if($task->stepDocument->count()>0)
                        <button class="btn btn-custom-disable" id="confirm" data-toggle="modal"  href="#" data-target="#disableTask{{$task->id}}" data-id="{{$task->id}}">Desactivar</button>
                        <!-- Modal -->
                        <div class="modal fade" id="disableTask{{$task->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h4 class="modal-title" id="myModalLabel">¿Estas seguro de desactivar la tarea: {{$task->name}}?</h4>
                                    </div>
                                    <div class="modal-body">
                                        <h4 class="modal-title" id="myModalLabel"><span style="color:red;" class="glyphicon glyphicon-warning-sign"></span> <p id="id"></p>Si necesita usar nuevamente esta tarea puede re-activarla en un futuro</h4>
                                    </div>
                                    <div class="modal-footer">
                                        <div id="delmodelcontainer" style="float:right">

                                            <div id="yes" style="float:left; padding-right:10px">
                                                <a href="#" class="btn btn-custom-disable">Si</a>
                                            </div> <!-- end yes -->

                                            <div id="no" style="float:left;">
                                                <button type="button" class="btn btn-custom-delete" data-dismiss="modal">No</button>
                                            </div><!-- end no -->

                                        </div> <!-- end delmodelcontainer -->

                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                    @else
                        <button class="btn btn-custom-delete" id="confirm" data-toggle="modal"  href="#" data-target="#delTask{{$task->id}}" data-id="{{$task->id}}">Eliminar</button>
                        <!-- Modal -->
                        <div class="modal fade" id="delTask{{$task->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h4 class="modal-title" id="myModalLabel">¿Estas seguro de Eliminar la tarea: {{$task->name}}?</h4>
                                    </div>
                                    <div class="modal-body">
                                        <h4 class="modal-title" id="myModalLabel"><span style="color:red;" class="glyphicon glyphicon-warning-sign"></span> <p id="id"></p>Si necesita usar nuevamente esta tarea en un futuro</h4>
                                    </div>
                                    <div class="modal-footer">
                                        <div id="delmodelcontainer" style="float:right">

                                            <div id="yes" style="float:left; padding-right:10px">
                                                {{ Form::open(['route' => ['task.destroy', $task->id ], 'method' => 'DELETE']) }}
                                                {{ Form::button('Eliminar', ['type' => 'submit', 'class' => 'btn btn-custom-delete']) }}
                                                {{ Form::close() }}
                                            </div> <!-- end yes -->

                                            <div id="no" style="float:left;">
                                                <button type="button" class="btn btn-defualt" data-dismiss="modal">No</button>
                                            </div><!-- end no -->

                                        </div> <!-- end delmodelcontainer -->

                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                    @endif
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
    {{$tasks->links()}}

@endsection
