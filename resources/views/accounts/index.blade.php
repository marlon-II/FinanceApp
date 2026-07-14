  <x-app-layout>
    <x-slot name="header">
        <div style="display:flex; justify-content: space-between; align-items: center;">
            <h2>Contas</h2>
            <a href="{{route('accounts.create')}}">Nova Conta</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div>{{ session('success') }}</div>
            @endif

            <livewire:accounts.account-list />
        </div>
    </div>
</x-app-layout>
 
 