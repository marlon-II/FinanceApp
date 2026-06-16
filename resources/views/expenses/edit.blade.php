<x-app-layout>
    <x-slot name="header">
        <h2>Editar Despesa</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form method="POST" action="{{ route('expenses.update', $expense) }}">
                    @csrf
                    @method('PUT')

                    <div>
                        <x-input-label for="description" value="Descrição" />
                        <x-text-input id="description" name="description" type="text" value="{{ old('description', $expense->description) }}" required />
                        <x-input-error :messages="$errors->get('description')" />
                    </div>

                    <div>
                        <x-input-label for="amount" value="Valor" />
                        <x-text-input id="amount" name="amount" type="number" step="0.01" value="{{ old('amount', $expense->amount) }}" required />
                        <x-input-error :messages="$errors->get('amount')" />
                    </div>

                    <div>
                        <x-input-label for="due_date" value="Data de Vencimento" />
                        <x-text-input id="due_date" name="due_date" type="date" value="{{ old('due_date', $expense->due_date) }}" required />
                        <x-input-error :messages="$errors->get('due_date')" />
                    </div>

                    <div>
                        <x-input-label for="status" value="Status" />
                        <select name="status" id="status">
                            <option value="pending" {{ $expense->status == 'pending' ? 'selected' : '' }}>Pendente</option>
                            <option value="paid" {{ $expense->status == 'paid' ? 'selected' : '' }}>Pago</option>
                            <option value="overdue" {{ $expense->status == 'overdue' ? 'selected' : '' }}>Vencido</option>
                        </select>
                    </div>

                    <div>
                        <x-input-label for="notes" value="Observações" />
                        <textarea name="notes" id="notes">{{ old('notes', $expense->notes) }}</textarea>
                        <x-input-error :messages="$errors->get('notes')" />
                    </div>

                    <div>
                        <x-primary-button>Atualizar</x-primary-button>
                        <a href="{{ route('expenses.index') }}">Cancelar</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>