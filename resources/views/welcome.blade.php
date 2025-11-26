<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Desafio Laravel</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased p-10" >
        
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="max-w-7xl mx-auto p-6 lg:p-8">
                <h1 class="text-4xl font-bold mb-4">Desafio 30 Dias</h1>

                <div class="mb-8 p-4 bg-white rounded shadow">
                    <form action="{{ route('topic.store') }}" method="POST">
                        @csrf
                        <input type="text" name="name" placeholder="Novo tópico..." class="border p-2 rounded w-full mb-2">
                        @error('name')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Adicionar</button>
                    </form>
                </div>

                <ul>
                    @foreach($topics as $topic)
                        <li class="mb-2 border-b pb-2 flex justify-between items-center">
                            <span>
                                {{ $loop->iteration }}. 
                                <a href="{{ route('topic.edit', $topic->id) }}" class="text-blue-600 hover:underline">
                                    {{ $topic->name }}
                                </a>
                            </span>

                            <form action="{{ route('topic.destroy', $topic->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 ml-4 font-bold">X</button>
                            </form>
                        </li>
                    @endforeach
                </ul>
                <div class="mt-4">
                    @if(Auth::check() && $topics->count() > 0)
                        {{ $topics->links() }}
                    @endif
                </div>
            </div>
        </div>
    </body>
</html>