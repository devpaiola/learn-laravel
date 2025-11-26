<h1>Editar Tópico</h1>
<form action="/topic/{{ $topic->id }}" method="POST">
    @csrf
    @method('PUT') <input type="text" name="name" value="{{ $topic->name }}">
    <button type="submit">Atualizar</button>
</form>