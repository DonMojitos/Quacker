<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quashtags</title>
    <link rel="stylesheet" href="{{ asset('css/perfil.css') }}">
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined"/>
</head>
<body>
    <main class="contenedor">
        <h1>Perfil de {{ $user->usuario }}</h1>
        <div class="datos">
            <p><strong>Nombre Real:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
        </div>
        <p>Popularidad: {{$popularidad}}</p>
        <p>Viralidad: {{$viralidad}}</p>
        <p>Quacks: {{ count($user->quacks) }}</p>
        <div class="seguir">
            <p>{{ count($user->siguiendo) }} Siguiendo</p>
            <p>{{ count($user->seguidores) }} Seguidores</p>
        </div>
        
        @if ($user->id != Auth::id())
            <form action="{{ route('users.follow', $user) }}" method="POST">
                @csrf
                    @if (in_array($user->id, Auth::user()->siguiendo()->pluck('users.id')->toArray()))
                        <input type="submit" name="unfollow" value="Dejar de seguir">
                    @else
                        <input type="submit" name="follow" value="Seguir">
                    @endif
            </form>
        @else
            <p class="feed"><a href="/users/{{ Auth::user()->id }}/edit">Edita tu perfil</a></p>
        @endif
        
        <p class="feed"><a href="/feed">Volver al feed</a></p>
    </main>
    
</body>
</html>