@extends('document.layout')
@section('body')
<div class="form-group text-center">
    <h1 class="page-header">{{$document->name}}</h1>
</div>
    <br>
{{$document->body}}
@endsection