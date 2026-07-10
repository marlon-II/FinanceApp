 <x-app-layout>
    <x-slot name="header">
        <div style="display:flex; justify-content: space-between; align-items: center;">
            <h2>Categorias</h2>
            <a href="{{route('categories.create')}}">Nova Categoria</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div>{{ session('success') }}</div>
            @endif

            <livewire:categories.category-list />
        </div>
    </div>
</x-app-layout>
 
