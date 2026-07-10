<x-app-layout> 
    <x-slot name="header">
        <h2>Nova Categoria</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{route('categories.store')}}">
                    @csrf

                    <div>
                        <x-input-label for="name" value="Nome"/>
                        <x-text-input id="name" name="name" type="text" value="{{ old('name') }}"required />
                        <x-input-error :messages="$errors->get('name')"/>
                    </div>

                    <div>
                        <x-input-label for="color" value="Cor da categoria"/>
                        <x-text-input id="color" name="color" type="text" value="{{ old('color') }}" required/>
                        <x-input-error :messages="$errors->get('color')"/>
                    </div>

                    <div>
                        <x-input-label for="icon" value="Icone da categoria"/>
                        <x-text-input id="icon" name="icon" type="text" value="{{ old('icon') }}" />
                        <x-input-error :messages="$errors->get('icon')"/>
                    </div>

                    <div>
                        <x-input-label for="monthly_limit" value="Limite mensal"/>
                        <x-text-input id="monthly_limit" name="monthly_limit" type="number" value="{{ old('monthly_limit') }}" required/>
                        <x-input-error :messages="$errors->get('monthly_limit')"/>
                    </div>

                    <div>
                        <x-primary-button>Salvar</x-primary-button>
                        <a href="{{ route('categories.index') }}">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>