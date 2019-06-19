@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Dashboard</h1>
    <small>Bem Vindo: <b>{{$user->name}}</b></small>
@stop

@section('content')

    <div class="box box-success">
        <div class="box-header">
            <p class="box-title">CERVEJA</p>
            <form action="" method="post" class="form-inline" style="float:right">
                @csrf
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Buscar cerveja externa..." required title="Para multiplos id separe com | ex: 1|2|3 retorna os itens 1, 2 e 3">
                        <span class="input-group-btn">
                            <button class="btn btn-secondary" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </div>
            </form>
        </div>
        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-borderless table-striped" id="table">
                    <thead>
                        <tr>
                            <th>IMG</th><th>Name</th><th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($beers as $beer)
                            <tr>
                                <td class=""><div style="width:32px; margin: 0 auto;"><a href="{{$beer->image_url}}" class="open-image"><img src="{{$beer->image_url}}" alt="" class="img-responsive"></a></div></td>
                                <td>{{$beer->name}}</td>
                                <td>
                                    <a href="{{ url('home/cerveja/' . $beer->id) }}" title=""><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                </td>
                            </tr>
                            {{-- {{dd($beer)}} --}}
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@stop

@section('js')
<script>
    $(document).ready(function() {
        $('#table').DataTable({
            responsive: true,
            "ordering": false,
            "pageLength": 5,
            "aLengthMenu": [[5, 10, 15, -1], ["5", "10", "15", "Todos"]],
            "language": {
                "decimal": ",",
                "thousands": ".",
                "sEmptyTable": "sem entradas na tabela",
                "sInfo": "Exibindo do _START_º até _END_º do total de _TOTAL_ registro(os)",
                "sInfoEmpty": "Exibindo 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                "sInfoPostFix": "",
                "sInfoThousands": ".",
                "sLengthMenu": "Exibir _MENU_ resultados por página",
                "sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...",
                "sZeroRecords": "Nenhum registro encontrado!",
                "sSearch": "Pesquisar",
                "oPaginate": {
                    "sNext": "Próximo",
                    "sPrevious": "Anterior",
                    "sFirst": "Primeiro",
                    "sLast": "Último"
                },
                "oAria": {
                    "sSortAscending": ": Ordenar colunas de forma ascendente",
                    "sSortDescending": ": Ordenar colunas de forma descendente"
                }
            }
        });
    });
</script>
@stop