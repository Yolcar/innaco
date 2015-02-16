@extends('layout')
@extends('sidebar')
@extends('navbar')

@section('body')
<h1 class="text-center">Flujo del Documento</h1>
<h3 class="page-header text-center">{{$document->name}}</h3>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Pasos</th>
            <th>Autor</th>
            <th>Grupo Responsable</th>
            <th>Estado</th>
            <th>Gestion</th>
        </tr>
        </thead>

        <tbody>
        @foreach($workflows as $workflow)
            <tr>
                <td>{{$workflow->stepdocument->task->name}}</td>
                @if($workflow->users_id == 0)
                    <td></td>
                @else
                    <td>{{$workflow->user->email}}</td>
                @endif
                <td>{{$workflow->stepdocument->group->name}}</td>
                <td>{{$workflow->state->name}}</td>
                @if($workflow->state->id == 2)
                    @if(\Sentry::getUser()->inGroup(Sentry::findGroupByName($workflow->stepdocument->group->name)))
                   <td><a class="btn btn-custom-step" href="{{Route('workflow.action',[$workflow->documents_id,$workflow->id])}}" data-toggle="popover" data-content="Permite visualizar las tares pendientes" data-original-title="Gestionar">Gestionar</a></td>
                    @else
                        <td></td>
                    @endif
                @else
                    <td> </td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>
    <a href="{{Route('document.index')}}" class="btn btn-custom-back" data-toggle="popover" data-content="Permite volver a la lista de los documentos creados" data-original-title="Atras">Atras</a>
</div>

@endsection

