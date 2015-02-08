{{ Form::label($name, $label) }}
<div class="form-group input-group date">
    {{ $control }}<span class="glyphicon glyphicon-calendar input-group-addon"></span>
</div>
@if ($error)
    <p class="error_message">{{ $error }}</p>
@endif
