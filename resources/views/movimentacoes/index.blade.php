@extends('layouts.app')

@section('content')

<div class="container-fluid px-4 fade-in">

    <h2 class="mb-4">Histórico de Movimentações</h2>


        <!-- MENSAGENS -->
        @if(session('erro'))
            <div class="alert alert-danger mt-3">
                {{ session('erro') }}
            </div>
        @endif

        @if(session('sucesso'))
            <div class="alert alert-success mt-3">
                {{ session('sucesso') }}
            </div>
        @endif

    </div>

    <!-- TABELA -->
    <div class="card p-4">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="mb-0">Movimentações</h5>

            <a href="/produtos" class="btn btn-primary">
                Voltar para Produtos
            </a>
        </div>

        <div class="table-responsive">

            <table id="tabela" class="table align-middle">

                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Tipo</th>
                        <th>Quantidade</th>
                        <th>Data</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($movimentacoes as $mov)
                        <tr>
                            <td>{{ $mov->produto->nome ?? 'Produto removido' }}</td>

                            <td>
                                <span class="badge bg-{{ $mov->tipo == 'entrada' ? 'success' : 'danger' }}">
                                    {{ ucfirst($mov->tipo) }}
                                </span>
                            </td>

                            <td>{{ $mov->quantidade }}</td>

                            <td>{{ $mov->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>

            </table>

        </div>

    </div>

</div>

<!-- DATATABLE -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function () {
    $('#tabela').DataTable({
        pageLength: 8,
        language: {
            search: "Pesquisar:",
            lengthMenu: "Mostrar _MENU_ registros",
            info: "Mostrando _START_ até _END_ de _TOTAL_ registros",
            paginate: {
                next: "Próximo",
                previous: "Anterior"
            },
            zeroRecords: "Nenhum resultado encontrado"
        }
    });
});
</script>

@endsection