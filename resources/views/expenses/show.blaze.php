<x-app-layout>
    <x-slot name="header">
        <h2>Detalhes da Despesa</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <div>
                    <p><strong>Descrição:</strong> {{ $expense->description }}</p>
                    <p><strong>Valor:</strong> R$ {{ number_format($expense->amount, 2, ',', '.') }}</p>
                    <p><strong>Vencimento:</strong> {{ \Carbon\Carbon::parse($expense->due_date)->format('d/m/Y') }}</p>
                    <p><strong>Categoria:</strong> {{ $expense->category->name ?? 'Sem categoria' }}</p>
                    <p><strong>Conta:</strong> {{ $expense->account->name ?? 'Sem conta' }}</p>
                    <p><strong>Tipo:</strong> {{ $expense->type }}</p>
                    <p><strong>Status:</strong> {{ $expense->status }}</p>
                    <p><strong>Observações:</strong> {{ $expense->notes ?? 'Nenhuma' }}</p>
                </div>

                <div>
                    <a href="{{ route('expenses.edit', $expense) }}">Editar</a>

                    <form method="POST" action="{{ route('expenses.destroy', $expense) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Deletar</button>
                    </form>

                    <a href="{{ route('expenses.index') }}">Voltar</a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>