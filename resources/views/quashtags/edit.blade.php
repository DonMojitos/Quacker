<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear quashtag</title>
</head>
<body>
    <form action="/quashtags/{{ $quashtag->id }}" method="POST">
        @csrf
        @method('PATCH')
        <label for="name">Nombre del quashtag:</label>
        <input type="text" id="name" name="name" value="{{ $quashtag->name }}" required>
        <br>
        <br>
        <input type="submit" value="Modificar quashtag">
    </form>
</body>
</html>