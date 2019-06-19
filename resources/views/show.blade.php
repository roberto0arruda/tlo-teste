@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Dashboard</h1>
    <small><a href="/home" class="btn btn-warning">voltar</a></small>
@stop

@section('content')
<div class="box box-danger">
    <div class="box-header">
        <h1 class="box-title">Cerveja: <b>{{$beer[0]->name}}</b> #{{$beer[0]->id}} </h1>
    </div>
    <div class="box-body">
        <div class="media">
            <div class="media-left">
                <a href="#">
                    <img class="media-object" src="{{ $beer[0]->image_url }}" alt="..." width="250em">
                </a>    
            </div>
            <div class="media-body">
                <div class="table">
                    <table class="table-striped table-hover">
                        <tr><th>Linha:</th><td>{{$beer[0]->tagline}}</td></tr>
                        <tr><th>Fabricado:</th><td>{{$beer[0]->first_brewed}}</td></tr>
                        <tr><th>Volume:</th><td>{{$beer[0]->volume->value}} {{$beer[0]->volume->unit}}</td></tr>
                        <tr><th>Descrição:</th><td>{{$beer[0]->description}}</td></tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop