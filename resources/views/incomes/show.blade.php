<x-app-layout>
    <x-slot name="header">
        <h2>Detalhes da Receita</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div>
                    <p><strong>Descrição:</strong> {{ $income->description }}</p>
                    <p><strong>Valor:</strong> R$ {{ number_format($income->amount, 2, ',', '.') }}</p>
                    <p><strong>Vencimento:</strong> {{ \Carbon\Carbon::parse($income->date)->format('d/m/Y') }}</p>
                    <p><strong>Conta:</strong> {{ $income->account->name ?? 'Sem conta' }}</p>
                    <p><strong>Tipo:</strong> {{ $income->type }}</p>
                    <p><strong>Recorrente:</strong> {{ $income->is_recurring ? 'Sim' : 'Não' }}</p>
                    <p><strong>Observações:</strong> {{ $income->notes ?? 'Nenhuma' }}</p>
                </div> 

                <div>
                    <a href="{{ route('incomes.edit', $income) }}">Editar</a>

                    <form method="POST" action="{{ route('incomes.destroy', $income) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Deletar</button>
                    </form>

                    <a href="{{ route('incomes.index') }}">Voltar</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>