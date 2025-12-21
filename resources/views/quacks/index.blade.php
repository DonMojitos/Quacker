<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quacks</title>
</head>
<style>
    article{
        background-color: lightblue;
        border-radius: 5px;
    }
</style>
<body>
    @auth
        <h1>Hola {{ Auth::user()->name }}</h1>
        <p><a href="/logout">Cerrar sesión</a></p>
    @endauth
    <div class="quackea">
        <p><a href="/quacks/create">🦆 Crear Quack</a></p>
    </div>
    <main>
        @foreach ($quacks as $quack)
            <article>
                <h3>{{ $quack->usuario }} ({{ $quack->created_at }})</h3>
                <p>{{ $quack->contenido }}</p>
                <p><a href="/quacks/{{ $quack->id }}">Ver más detalles</a></p>
                <form action="/quacks/{{ $quack->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>Eliminar</button>
                </form>
                <p><a href="/quacks/{{ $quack->id }}/edit">Editar</a></p>
            </article>
        @endforeach
    </main>
</html>
