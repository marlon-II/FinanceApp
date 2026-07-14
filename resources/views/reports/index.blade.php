<x-app-layout>
    <x-slot name="header">
        <h2>Relatórios</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <h3>Despesas</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Descrição</th>
                            <th>Categoria</th>
                            <th>Valor</th>
                            <th>Data</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($expenses as $expense)
                        <tr>
                            <td>{{ $expense->description }}</td>
                            <td>{{ $expense->category->name ?? 'Sem categoria' }}</td>
                            <td>R$ {{ number_format($expense->amount, 2, ',', '.') }}</td>
                            <td>{{ \Carbon\Carbon::parse($expense->date)->format('d/m/Y') }}</td>
                            <td>{{ $expense->status }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <h3>Receitas</h3>
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

                <div>
                    <a href="{{ route('reports.pdf') }}">Exportar PDF</a>
                    <a href="{{ route('reports.excel') }}">Exportar Excel</a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>