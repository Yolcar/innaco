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
        </tr>
        </thead>

        <tbody>
        @foreach($workflows as $workflow)
            <tr>
                <td>{{$workflow->id}}</td>
                <td>{{$workflow->user->email}}</td>
                <td>{{$workflow->estado->name}}</td>

            </tr>
        @endforeach
        </tbody>

    </table>
</div>

@endsection