<x-app-layout>
    <x-slot name="header">
        <h2>Detalhes da Categoria</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div>
                    <p><strong>Nome</strong>: {{$category->name}}</p>
                    <p><strong>Cor</strong>: {{$category->color}}</p>
                    <p><strong>icon</strong>: {{$category->icon}}</p>
                    <p><strong>Limite mensal</strong>: {{number_format($category->monthly_limit, 2, ',', '.')}}</p>
                </div>

                <div>
                    <a href="{{route('categories.edit', $category )}}">Editar</a>

                    <form method="POST" action="{{route('categories.destroy', $category )}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Deletar</button>
                    </form>

                    <a  href="{{route('categories.index')}}">Voltar</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>