<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Options Articles') }}
        </h2>
    </x-slot>

    @if (session('success'))
        {{session('success')}}
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- @if (session('success'))
                {{session('success')}}
            @endif --}}

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @foreach ($articles as $article)
                <div class="mt-6">
                    <div class="max-w-4xl px-10 py-6 mx-auto bg-white rounded-lg shadow-md">
                        <div class="flex items-center justify-between">
                            <span class="font-light text-gray-600">
                                {{ $article->created_at }}
                                {{-- ->format('d M Y') --}}
                            </span>
                            
                            <a href="#"
                                class="px-2 py-1 font-bold text-gray-100 bg-gray-600 rounded hover:bg-gray-500">{{ $article->category->name }}
                            </a>
                            
                        </div>
                        <div class="mt-2">
                            <a href="#" class="text-2xl font-bold text-gray-700 hover:underline">
                                {{ $article->title }}
                            </a>
                            <p class="mt-2 text-gray-600">
                                {{-- {{ Str::limit($article->content, 120) }} --}}
                                {{ $article->content}}
                            </p>
                        </div>
                        <div class="flex items-center justify-between mt-4"><a href="{{ route('articles.show', $article) }}"
                                class="text-blue-500 hover:underline">Voir plus</a>
                                <h1 class="font-bold text-gray-700 hover:underline">{{ $article->user->name }}</h1>
                        </div>

                        <div class="flex items-center">
                            <a href="{{route('articles.edit', $article)}}" class="bg-blue-500 px-2 py-3 block">Editer</a>
                        
                            <form action="{{ route('articles.destroy', $article) }}" method="post">
                                @csrf
                                @method('DELETE')
                        
                                <button>Delete</button>
                            </form>
                        </div>

                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>


{{-- <div class="flex items-center">
    <a href="{{route('articles.edit', $article)}}" class="bg-blue-500 px-2 py-3 block">Editer {{$article->title}}</a>

    <form action="{{ route('articles.destroy', $article) }}" method="post">
        @csrf
        @method('DELETE')

        <button>Delete</button>
    </form>
</div> --}}

        {{-- <a href="" class="bg-red-500 px-2 py-3 block">Supprimer {{$article->title}}</a> --}}
