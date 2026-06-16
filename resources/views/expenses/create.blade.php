<x-app-layout>
    <x-slot name="header">
        <h2>Nova Despesa</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form method="POST" action="{{ route('expenses.store') }}">
                    @csrf

                    <div>
                        <x-input-label for="description" value="Descrição" />
                        <x-text-input id="description" name="description" type="text" value="{{ old('description') }}" required />
                        <x-input-error :messages="$errors->get('description')" />
                    </div>

                    <div>
                        <x-input-label for="amount" value="Valor" />
                        <x-text-input id="amount" name="amount" type="number" step="0.01" value="{{ old('amount') }}" required />
                        <x-input-error :messages="$errors->get('amount')" />
                    </div>

                    <div>
                        <x-input-label for="due_date" value="Data de Vencimento" />
                        <x-text-input id="due_date" name="due_date" type="date" value="{{ old('due_date') }}" required />
                        <x-input-error :messages="$errors->get('due_date')" />
                    </div>

                    <div>
                        <x-input-label for="category_id" value="Categoria" />
                        <select name="category_id" id="category_id">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('category_id')" />
                    </div>

                    <div>
                        <x-input-label for="account_id" value="Conta" />
                        <select name="account_id" id="account_id">
                            @foreach($accounts as $account)
                                <option value="{{ $account->id }}">{{ $account->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('account_id')" />
                    </div>

                    <div>
                        <x-input-label for="type" value="Tipo" />
                        <select name="type" id="type">
                            <option value="fixed">Fixo</option>
                            <option value="variable">Variável</option>
                            <option value="installment">Parcelado</option>
                        </select>
                    </div>

                    <div>
                        <x-input-label for="status" value="Status" />
                        <select name="status" id="status">
                            <option value="pending">Pendente</option>
                            <option value="paid">Pago</option>
                            <option value="overdue">Vencido</option>
                        </select>
                    </div>

                    <div>
                        <x-input-label for="notes" value="Observações" />
                        <textarea name="notes" id="notes">{{ old('notes') }}</textarea>
                        <x-input-error :messages="$errors->get('notes')" />
                    </div>

                    <div>
                        <x-primary-button>Salvar</x-primary-button>
                        <a href="{{ route('expenses.index') }}">Cancelar</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>