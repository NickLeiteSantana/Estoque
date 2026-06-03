@extends('layouts.app')

@section('content')

<div class="container-fluid px-4 fade-in">

    <h1 class="mb-4">Dashboard do Estoque</h1>

    <!-- CARDS -->
    <div class="row g-4">

        <div class="col-lg-3 col-md-6">
            <div class="card card-dashboard text-center bg-primary-soft p-3">
                <h6>Total de Produtos</h6>
                <h2>{{ $totalProdutos }}</h2>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card card-dashboard text-center bg-warning-soft p-3">
                <h6>Total em Estoque</h6>
                <h2>{{ $totalEstoque }}</h2>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card card-dashboard text-center bg-success-soft p-3">
                <h6>Entradas</h6>
                <h2>{{ $entradas }}</h2>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card card-dashboard text-center bg-danger-soft p-3">
                <h6>Saídas</h6>
                <h2>{{ $saidas }}</h2>
            </div>
        </div>

    </div>

    <!-- ALERTA ESTOQUE BAIXO -->
    @if($estoqueBaixo->count() > 0)
        <div class="alert alert-warning mt-4">
            <h5>⚠ Produtos com estoque baixo</h5>
            <ul class="mb-0">
                @foreach($estoqueBaixo as $produto)
                    <li>{{ $produto->nome }} — {{ $produto->quantidade }} unidades</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- GRÁFICO + TABELA -->
    <div class="row g-4 mt-4">

        <!-- GRÁFICO -->
        <div class="col-lg-6">
            <div class="card p-4 h-100">
                <h5 class="mb-3">Movimentações</h5>

                <div class="grafico-box">
                    <canvas id="grafico"></canvas>
                </div>
            </div>
        </div>

        <!-- TABELA -->
        <div class="col-lg-6">
            <div class="card p-4 h-100">
                <h5 class="mb-3">Últimas Movimentações</h5>

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
                            @foreach($ultimasMovimentacoes as $mov)
                                <tr>
                                    <td>{{ $mov->produto->nome }}</td>
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

    </div>



<!-- CHART JS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {

    const ctx = document.getElementById('grafico').getContext('2d');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Entradas', 'Saídas'],
            datasets: [{
                data: [{{ $entradas }}, {{ $saidas }}],
                backgroundColor: ['#10b981', '#ef4444'],
                borderRadius: 8,
                barThickness: 40
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: { color: '#e5e7eb' }
                },
                x: {
                    grid: { display: false }
                }
            }
        }
    });

});
</script>

<script>
$(document).ready(function () {
    $('#tabela').DataTable({
        pageLength: 5,
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