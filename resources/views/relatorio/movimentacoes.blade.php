@extends('layouts.app')

@section('content')
<h1>Relatório de Movimentações</h1>

<table border="1" cellpadding="10">
<tr>
    <th>Produto</th>
    <th>Tipo</th>
    <th>Quantidade</th>
    <th>Data</th>
</tr>

@foreach($movimentacoes as $mov)
<tr>
    <td>{{ $mov->produto->nome ?? 'Sem produto' }}</td>
    <td>{{ $mov->tipo }}</td>
    <td>{{ $mov->quantidade }}</td>
    <td>{{ $mov->created_at }}</td>
</tr>
@endforeach
@endsection
</table>