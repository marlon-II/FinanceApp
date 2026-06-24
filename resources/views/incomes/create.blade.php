<x-app-layout>
    <x-slot name="header">
        <h2>Nova Reda</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{route('incomes.store')}}">
                    @csrf
                    
                    <div>
                        <x-input-label for="description" value="Descrição" />
                        <x-text-input id="description" name="description" type="text" value="{{old('description')}}" required/>
                        <x-input-error :messages="$errors->get('description')"/>
                    </div>

                    <div>
                        <x-input-label for="amount" value="Valor"/>
                        <x-text-input id="amount" name="amount" type="number" step="0.01" value="{{old('amount')}}" required/>
                        <x-input-error :messages="$errors->get('amount')"/>
                    </div>

                    <div>
                        <x-input-label for="type"  value="Categoria do valor"/>
                        <select id="type" name="type">
                            <option value="salary">Salário</option>
                            <option value="freelance">Freelance</option>
                            <option value="investment">Investimentos</option>
                            <option value="other">Outro</option>
                        </select>
                        <x-input-error :messages="$errors->get('type')" />
                    </div>

                    <div>
                        <x-input-label for="is_recurring" value="Valor recorreente"/>
                        <input type="checkbox" name="is_recurring" value="1">
                        <x-input-error :messages="$errors->get('is_recurring')" />
                    </div>

                    <div>
                        <x-input-label for="date" value="Data"/>
                        <x-text-input id="date" name="date" type="date" value="{{old('date')}}" required/>
                        <x-input-error :messages="$errors->get('date')"/>
                    </div>

                    <div>
                        <x-input-label for="notes" value="Notas"/>
                        <textarea id="notes" name="notes" >{{ old('notes') }}</textarea>
                        <x-input-error :messages="$errors->get('notes')"/>
                    </div>

                    <div>
                        <x-input-label for="account_id" value="Conta" />
                        <select name="account_id" id="account_id">
                            @foreach($accounts as $account)
                                <option value="{{ $account->id }}">{{ $account->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('account_id')"/>
                    </div>

                    <div>
                        <x-primary-button>Salvar</x-primary-button>
                        <a href="{{ route('incomes.index') }}">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>