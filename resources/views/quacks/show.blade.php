<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Feed</title>
    <link rel="stylesheet" href="{{ asset('css/quack.css') }}">
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
        <article class="quack">
                <a href="/users/{{ $quack->user->id }}">
                    @if ($quack->user->id == Auth::user()->id)
                        <div class="foto-user"></div>
                    @else
                        <div class="foto"></div>
                    @endif
                </a>
                <div>
                    <div class="contenido">
                        <div class="nombreFecha">
                            <h2><a href="/users/{{ $quack->user->id }}/quacks">{{ $quack->user->name }}</a></h2><p>&#64{{$quack->user->usuario }} · ({{ $quack->created_at->diffForHumans() }})</p>
                        </div>
                        <p>{{ $quack->contenido }}</p>
                        @if (!$quack->quashtags->isEmpty())
                                @foreach ($quack->quashtags as $quashtag)
                                    <p><a href="/quashtags/{{$quashtag->id}}/quacks">#{{ $quashtag->nombre }}</a></p>
                                @endforeach
                        @endif
                    </div>
                    <div class="interacciones">
                        <form action="/quacks/{{ $quack->id }}/requack" method="POST">
                            @csrf
                            @if (Auth::user()->quacksRequackeados()->where('quack_id', $quack->id)->exists())
                                <label class="retweet">
                                    <img src="{{ asset('img/retweet-fill.png') }}" alt="retweet">
                                    <button  type="submit">{{ $quack->usersRequacked->count() }}</button>
                                </label>
                            @else
                                <label class="retweet">
                                    <img src="{{ asset('img/retweet.png') }}" alt="retweet">
                                    <button type="submit">{{ $quack->usersRequacked->count() }}</button>
                                </label>
                            @endif
                        </form>
                        <form action="/quacks/{{ $quack->id }}/quav" method="POST">
                            @csrf
                            @if (Auth::user()->quacksQuaveados()->where('quack_id', $quack->id)->exists())
                                <button type="submit">♥ {{ $quack->usersQuaved->count() }}</button>
                            @else
                                <button type="submit">♡ {{ $quack->usersQuaved->count() }}</button>
                            @endif
                        </form>
                        @can('edit', $quack)
                            <form action="/quacks/{{ $quack->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button><span class="material-symbols-outlined">delete</span></button>
                            </form>
                            <p><a class="zoom" href="/quacks/{{ $quack->id }}/edit"><span class="material-symbols-outlined">edit</span></a></p>
                        @endcan
                    </div>
                </div>
            </article>
            <hr>
    </main>
</body>
</html>
