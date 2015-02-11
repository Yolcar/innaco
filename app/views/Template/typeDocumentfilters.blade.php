
<h3>Seleccione el Tipo de Documento</h3>
<div class="span4"><button id="typedocuments" type="button" class="btn btn-info" data-toggle="collapse" data-target="#myDiv" data-open-text="Ocultar">Mostrar</button></div>
<script>
    $("[type=button]").button();
    $("[type=button]").click(function(){
        $(this).button('toggle');
        if ($(this).text()==="Mostrar"){
            $(this).button('open');
        }
        else {
            $(this).button('reset');
        }
    });
</script>
<div class="span4 collapse" id="myDiv">
{{ Form::open(['route' => 'template.create', 'method' => 'GET']) }}

{{ Form::text('search') }}
{{ Form::button('Buscar',['type' => 'submit', 'class' => 'btn btn-primary']) }}

{{Form::close()}}
<table class="table .table-hover">
    <div id="dam_return">
    <thead>
    </thead>
    <tbody>
    @foreach($typeDocuments as $typeDocument)
        <tr>
            <td class="name">{{$typeDocument->name}}</td>
            <td>
                <button onclick="asignarID('{{$typeDocument->id}}','{{$typeDocument->name}}')" type="button" class="btn btn-default">Usar Tipo</button>
            </td>
        </tr>
    @endforeach
    </tbody>
    </div>
</table>
{{$typeDocuments->links()}}
</div>
