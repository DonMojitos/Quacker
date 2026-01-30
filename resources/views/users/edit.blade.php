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
        
        <form class="formulario" action="/users/{{ $user->id }}" method="POST">
            @csrf
            @method('PATCH')
            <h2>Formulario para actualizar tus datos:</h2>
            <div class="inputs">
                <span class="material-symbols-outlined">id_card</span>
                <input type="text" name="name" value="{{ $user->name }}" required maxlength="50">
            </div>
            <hr>
            <div class="inputs">
                <span class="material-symbols-outlined">account_circle</span>
                <input type="text" name="usuario" value="{{ $user->usuario }}" required maxlength="50">
            </div>
            <hr>
            <div class="inputs">
                <span class="material-symbols-outlined">mail</span>
                <input type="email" name="email" value="{{ $user->email }}" required maxlength="120">
            </div>
            <hr>
            <button type="submit">Actualizar</button>
        </form>
        <p class="feed"><a href="/feed">Volver al feed</a></p>
    </main>
</body>
</html>