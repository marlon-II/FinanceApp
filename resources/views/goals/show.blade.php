<x-app-layout>
    <x-slot name="header">
        <h2>Detalhes da Meta</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div>
                    <p><strong>Nome:</strong> {{ $goal->name }}</p>
                    <p><strong>Valor da Meta:</strong> R$ {{ number_format($goal->target_amount, 2, ',', '.') }}</p>
                    <p><strong>Valor Atual:</strong> R$ {{ number_format($goal->current_amount, 2, ',', '.') }}</p>
                    <p><strong>Progresso:</strong> {{ number_format($goal->progressPercent(), 2, ',', '.') }}%</p>
                    <p><strong>Prazo:</strong> {{ $goal->deadline->format('d/m/Y') }}</p>
                    <p><strong>Status:</strong> {{ $goal->status }}</p>
                    <p><strong>Observações:</strong> {{ $goal->notes ?? 'Nenhuma' }}</p>
                </div>
                <div>
                    <a href="{{ route('goals.edit', $goal) }}">Editar</a>
                    <form method="POST" action="{{ route('goals.destroy', $goal) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Deletar</button>
                    </form>
                    <a href="{{ route('goals.index') }}">Voltar</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>