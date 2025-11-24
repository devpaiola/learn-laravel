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

<form action="/adicionar-topico" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Novo tópico">
    <button type="submit">Add Tópico</button> 
</form>