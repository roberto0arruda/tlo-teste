@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Users</h1>
    <small><a href="/home" class="btn btn-warning" title="Voltar">voltar</a></small>
@stop

@section('content')
<div class="box box-success">
    <div class="box-header">Users
        <form action="/users" method="get" class="form-inline" style="float:right">
            <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Search...">
                <span class="input-group-btn">
                    <button class="btn btn-secondary" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
    </div>
    <div class="box-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th><th>Name</th><th>Email</th><th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($users as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td><a href="{{ url('users', $item->id) }}">{{ $item->name }}</a></td><td>{{ $item->email }}</td>
                        <td>
                            <a href="{{ url('users/' . $item->id) }}" title="View User"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="pagination"> {!! $users->appends(['search' => Request::get('search')])->render() !!} </div>
        </div>
    </div>
</div>
@stop
