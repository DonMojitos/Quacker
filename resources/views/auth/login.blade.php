<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quacker - Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
</head>
<body>
    <main class="contenedor">
        <div>
            <form class="formulario" action="/login" method="post">
                @csrf
                <h1>Quacker</h1>
                <img id="logo" src="{{ asset('img/pato.png') }}" alt="logo.jpg">
                <div class="inputs">
                    <span class="material-symbols-outlined">mail</span>
                    <input type="email" name="email" id="email" placeholder="Email" :value={{ old('email') }}>
                </div>
                <hr>
                @error('email')
                    <span style="color:red">{{ $message }}</span>
                @enderror
                <div class="inputs">
                    <span class="material-symbols-outlined">lock</span>
                    <input type="password" name="password" placeholder="Password" id="password">
                </div>
                <hr>
                @error('password')
                    <span style="color:red">{{ $message }}</span>
                @enderror
                <button type="submit">Log in</button>
                @error('error_validacion')
                    <p style="color: red">{{ $message }}</p>
                @enderror
            </form>
        </div>
    </main>
</body>
</html>
