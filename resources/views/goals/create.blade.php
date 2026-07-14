<x-app-layout>
    <x-slot name="header">
        <h2>Nova Meta</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('goals.store') }}">
                    @csrf
                    <div>
                        <x-input-label for="name" value="Nome da Meta" />
                        <x-text-input id="name" name="name" type="text" value="{{ old('name') }}" required />
                        <x-input-error :messages="$errors->get('name')" />
                    </div>
                    <div>
                        <x-input-label for="target_amount" value="Valor da Meta (R$)" />
                        <x-text-input id="target_amount" name="target_amount" type="number" step="0.01" value="{{ old('target_amount') }}" required />
                        <x-input-error :messages="$errors->get('target_amount')" />
                    </div>
                    <div>
                        <x-input-label for="current_amount" value="Valor Atual (R$)" />
                        <x-text-input id="current_amount" name="current_amount" type="number" step="0.01" value="{{ old('current_amount', '0.00') }}" />
                        <x-input-error :messages="$errors->get('current_amount')" />
                    </div>
                    <div>
                        <x-input-label for="deadline" value="Prazo" />
                        <x-text-input id="deadline" name="deadline" type="date" value="{{ old('deadline') }}" required />
                        <x-input-error :messages="$errors->get('deadline')" />
                    </div>
                    <div>
                        <x-input-label for="notes" value="Observações" />
                        <textarea id="notes" name="notes">{{ old('notes') }}</textarea>
                        <x-input-error :messages="$errors->get('notes')" />
                    </div>
                    <div>
                        <x-primary-button>Salvar</x-primary-button>
                        <a href="{{ route('goals.index') }}">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>