<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar perfil</title>
    <link rel="stylesheet" href="{{ asset('css/editPerfil.css') }}">
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
</head>
<body>
    <main class="contenedor">
        <form class="formulario" action="/quacks/{{ $quack->id }}" method="post">
            @csrf
            @method('PATCH')
            <h2>Contenido del quack:</h2>
            <textarea id="contenido" name="contenido" rows="4" cols="50" required>{{ $quack->contenido }}</textarea><br><br>
            <button type="submit">Actualizar</button>
        </form>
        
        <p class="feed"><a href="/feed">Volver al feed</a></p>
    </main>
</body>
</html>