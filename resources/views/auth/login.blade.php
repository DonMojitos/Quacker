<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Introduzca sus datos</h1>
    <form action="/login" method="post">
        @csrf
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" placeholder="Introduce tu email" :value={{ old('email') }}>
        @error('email')
            <span style="color:red">{{ $message }}</span>
        @enderror<br><br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
        @error('password')
            <span style="color:red">{{ $message }}</span>
        @enderror<br><br>
        <button type="submit">Enviar</button>
        @error('error_validacion')
            <p style="color: red">{{ $message }}</p>
        @enderror
    </form>
</body>
</html>
