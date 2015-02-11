@extends('layout')
@extends('sidebar')
@extends('navbar')

@section('body')
<h1 class="page-header">Tracking del Documento</h1>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Tracking</th>
            <th>Responsable</th>
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
                <td>{{$workflow->state->name}}</td>
                @if($workflow->state->id == 2)
                   <td><a class="btn btn-info" href="#">Gestionar</a></td>
                @else
                    <td> </td>
                @endif
            </tr>
        @endforeach
        </tbody>

    </table>
</div>

@endsection

