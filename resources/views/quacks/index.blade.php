<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Feed</title>
    <link rel="stylesheet" href="{{ asset('css/feed.css') }}">
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined"/>
</head>
<body>
    <nav class="navegacion">
        <a href="/users/{{ Auth::user()->id }}" ><div class="foto-personal"></div></a>
        @if ( request()->path() == 'feed')
            <h1>{{Auth::user()->usuario}}</h1>
        @else
            <h1><a href="/feed">Ir a tu feed</a></h1>
        @endif
        <p><a id="logout"  href="/logout"><span class="material-symbols-outlined">logout</span></a></p>
    </nav>
    <hr>
    <main class="contenedor">
         <div class="quackea">
            <form action="/quacks" method="post">
                @csrf
                <div class="escribir">
                    <a href="/users/{{ Auth::user()->id }}"><div class="foto-user"></div></a>
                    <input type="text" id="contenido" placeholder="¿Qué vas a quackear?" name="contenido" required>
                </div>
                <div id="enviarQuack">
                    <input type="submit" value="Quack!">
                </div>
            </form>
        </div>
        <hr>
        @foreach ($feed as $mensaje)
            @if ($mensaje->tipo == 'requack')
                <h2>Requack</h2>
            @endif
            <article class="quack">
                <a href="/users/{{ $mensaje->user->id }}">
                    @if ($mensaje->user->id == Auth::user()->id)
                        <div class="foto-user"></div>
                    @else
                        <div class="foto"></div>
                    @endif
                </a>
                <div>
                    <div class="contenido">
                        <div class="nombreFecha">
                            <h2><a href="/users/{{ $mensaje->user->id }}/quacks">{{ $mensaje->user->name }}</a></h2><p>&#64{{$mensaje->user->usuario }} · ({{ $mensaje->created_at->diffForHumans() }})</p>
                        </div>
                        <p>{{ $mensaje->contenido }}</p>
                        @if (!$mensaje->quashtags->isEmpty())
                                @foreach ($mensaje->quashtags as $quashtag)
                                    <p><a href="/quashtags/{{$quashtag->id}}/quacks">#{{ $quashtag->nombre }}</a></p>
                                @endforeach
                        @endif
                    </div>
                    <div class="interacciones">
                        <form action="/quacks/{{ $mensaje->id }}/requack" method="POST">
                            @csrf
                            @if (Auth::user()->quacksRequackeados()->where('quack_id', $mensaje->id)->exists())
                                <label class="retweet">
                                    <img src="{{ asset('img/retweet-fill.png') }}" alt="retweet">
                                    <button  type="submit">{{ $mensaje->usersRequacked->count() }}</button>
                                </label>
                            @else
                                <label class="retweet">
                                    <img src="{{ asset('img/retweet.png') }}" alt="retweet">
                                    <button type="submit">{{ $mensaje->usersRequacked->count() }}</button>
                                </label>
                            @endif
                        </form>
                        <form action="/quacks/{{ $mensaje->id }}/quav" method="POST">
                            @csrf
                            @if (Auth::user()->quacksQuaveados()->where('quack_id', $mensaje->id)->exists())
                                <button type="submit">♥ {{ $mensaje->usersQuaved->count() }}</button>
                            @else
                                <button type="submit">♡ {{ $mensaje->usersQuaved->count() }}</button>
                            @endif
                        </form>
                        
                        <p><a class="zoom" href="/quacks/{{ $mensaje->id }}"><span class="material-symbols-outlined">zoom_out_map</span></a></p>
                        @can('edit', $mensaje)
                            <form action="/quacks/{{ $mensaje->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button><span class="material-symbols-outlined">delete</span></button>
                            </form>
                            <p><a class="zoom" href="/quacks/{{ $mensaje->id }}/edit"><span class="material-symbols-outlined">edit</span></a></p>
                        @endcan
                    </div>
                </div>
            </article>
            <hr>
        @endforeach
    </main>
</html>
