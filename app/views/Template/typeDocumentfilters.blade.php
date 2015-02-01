
<h3>Seleccione el Tipo de Documento</h3>
<div class="span4"><button type="button" class="btn btn-info" data-toggle="collapse" data-target="#myDiv" data-open-text="Ocultar">Mostrar</button></div>
<div class="span4 collapse" id="myDiv">
{{ Form::open(['route' => 'template.create', 'method' => 'GET']) }}

{{ Form::text('search') }}
{{ Form::button('Buscar',['type' => 'submit', 'class' => 'btn btn-primary']) }}

{{Form::close()}}
<table class="table .table-hover">
    <div id="dam_return">
    <thead>
    <tr>
        <th>Nombre</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($typeDocuments as $typeDocument)
        <tr>
            <td class="name">{{$typeDocument->name}}</td>
            <td>
                <button id={{$typeDocument->id}} type="button" class="btn btn-default">Usar Tipo</button>
            </td>
        </tr>
    @endforeach
    </tbody>
    </div>
</table>
{{$typeDocuments->links()}}
</div>
