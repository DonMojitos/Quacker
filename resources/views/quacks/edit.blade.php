<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quacks</title>
</head>
<body>
    <form action="/quacks/{{ $quack->id }}" method="post">
        @csrf
        @method('PATCH')

        <label for="contenido">Quack:</label><br>
        <textarea id="contenido" name="contenido" rows="4" cols="50" required>{{ $quack->contenido }}</textarea><br><br>

        <input type="submit" value="Quackear">
    </form>
</body>
</html>