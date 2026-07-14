  <x-app-layout>
    <x-slot name="header">
        <h2>Detalhes da Conta</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div>
                    <p><strong>Nome</strong>: {{$account->name}}</p>
                    <p><strong>Tipo</strong>: {{$account->type}}</p>
                    <p><strong>Saldo</strong>: R$ {{ number_format($account->balance, 2, ',', '.') }}</p>
                    <p><strong>Nome do Banco</strong>: {{$account->bank_name}}</p>
                    <p><strong>Número da conta</strong>: {{$account->account_number}}</p>
                </div>
 
                <div>
                    <a href="{{route('accounts.edit', $account )}}">Editar</a>

                    <form method="POST" action="{{route('accounts.destroy', $account )}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Deletar</button>
                    </form>

                    <a  href="{{route('accounts.index')}}">Voltar</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 