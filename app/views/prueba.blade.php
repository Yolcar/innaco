@extends('layout')
@extends('sidebar')
@extends('navbar')

<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.4/css/jquery.dataTables.css">

<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>

<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.js"></script>


@section('body')
    <h1 class="page-header">Prueba</h1>

    <div class="form-group">
        {{Form::label('name','Nombre')}}
        {{Form::text('name')}}
    </div>


    <p>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Llenar</button>


    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Llenar Campo</h4>
                </div>

                 <table class="table .table-hover">
                    <thead>
                    <tr>
                        <th width="30%">Tipo Plantilla</th>
                        <th width="40%">Nombre</th>
                        <th width="30%">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($documents as $document)
                        <tr>
                           <td>{{$document->template->name}}</td>
                            <td class="name">{{$document->name}}</td>
                            <td>

                            <td>
                                <button onclick="asignarID('{{$document->name}}')" type="button" class="btn btn-primary" data-dismiss="modal">Usar Tipo</button>
                            </td>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                </div>




            </div>
        </div>
    </div>


    </p>
    @include('document.filters')
    <table class="table .table-hover">
        <thead>
        <tr>
            <th width="30%">Tipo Plantilla</th>
            <th width="40%">Nombre</th>
            <th width="30%">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($documents as $document)
            <tr>
                <td>{{$document->template->name}}</td>
                <td class="name">{{$document->name}}</td>
                <td>

                <td>
                    <button onclick="asignarID('{{$document->name}}')" type="button" class="btn btn-primary" data-dismiss="modal">Usar Tipo</button>
                </td>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>


    <h1 </h1>

    <h1 class="page-header">Tareas</h1>
    <p>
    <div class="btn-group" data-toggle="buttons">
        <label class="btn btn-primary active">
            <input type="checkbox" autocomplete="off" checked>  Crear
        </label>
        <label class="btn btn-primary">
            <input type="checkbox" autocomplete="off"> Revisar
        </label>
        <label class="btn btn-primary">
            <input type="checkbox" autocomplete="off"> Aprobar
        </label>
    </div>
    </p>
    <h2 class="sub-header"></h2>




@endsection





