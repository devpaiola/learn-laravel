<h1>Olá, {{ $nome }}</h1>

@if (count($topicos) > 0)
    <ul>
        @foreach ($topicos as $topico)
            <li>{{ $topico }}</li>
        @endforeach
    </ul>
@else
    <p>Nada encontrado</p>
@endif