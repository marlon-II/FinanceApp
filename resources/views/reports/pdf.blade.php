<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Relatório Financeiro</title>
</head>
<body>
    <h1>Relatório Financeiro</h1>

    <h2>Despesas</h2>
    <table>
        <thead>
            <tr>
                <th>Descrição</th>
                <th>Categoria</th>
                <th>Valor</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
            @foreach($expenses as $expense)
            <tr>
                <td>{{ $expense->description }}</td>
                <td>{{ $expense->category->name ?? 'Sem categoria' }}</td>
                <td>R$ {{ number_format($expense->amount, 2, ',', '.') }}</td>
                <td>{{ \Carbon\Carbon::parse($expense->date)->format('d/m/Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Receitas</h2>
    <table>
        <thead>
            <tr>
                <th>Descrição</th>
                <th>Valor</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
            @foreach($incomes as $income)
            <tr>
                <td>{{ $income->description }}</td>
                <td>R$ {{ number_format($income->amount, 2, ',', '.') }}</td>
                <td>{{ \Carbon\Carbon::parse($income->date)->format('d/m/Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>