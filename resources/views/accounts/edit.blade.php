  <x-app-layout> 
    <x-slot name="header">
        <h2>Editar Conta</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{route('accounts.update')}}">            
                    @csrf
                    @method('PUT')
                    
                    <x-input-label for="name" value="Nome"/>
                    <x-text-input id="name" name="name" type="text" value="{{ old('name') }}"/>
                    <x-input-error :messages="$errors->get('name')"/>

                     <div>
                        <x-input-label for="type" value="Tipo" />
                        <select name="type" id="type">
                            <option value="checking" {{ old('type', $account->type) == 'checking' ? 'selected' : '' }}>Conta Corrente</option>
                            <option value="savings" {{ old('type', $account->type) == 'savings' ? 'selected' : '' }}>Poupança</option>
                            <option value="investment" {{ old('type', $account->type) == 'investment' ? 'selected' : '' }}>Investimento</option>
                            <option value="cash" {{ old('type', $account->type) == 'cash' ? 'selected' : '' }}>Dinheiro</option>
                        </select>
                    </div>
 
                    <x-input-label for="balance" value="Saldo"/>
                    <x-text-input id="balance" name="balance" type="number" value="{{ old('balance') }}"/>
                    <x-input-error :messages="$errors->get('balance')"/>

                    <x-input-label for="bank_name" value="Nome do Banco"/>
                    <x-text-input id="bank_name" name="bank_name" type="text" value="{{ old('bank_name') }}" />
                    <x-input-error :messages="$errors->get('bank_name')"/>

                    <x-input-label for="account_number" value="Número da conta"/>
                    <x-text-input id="account_number" name="account_number" type="text" value="{{ old('account_number') }}" />
                    <x-input-error :messages="$errors->get('account_number')"/>


                    <div>
                        <x-primary-button>Atualizar</x-primary-button>
                        <a href="{{ route('accounts.index') }}">Cancelar</a>
                    </div>
                </form>

                </div>
            </div>
        </div>
                