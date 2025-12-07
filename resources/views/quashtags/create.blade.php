<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear quashtag</title>
</head>
<body>
    <form action="/quashtags" method="POST">
        @csrf
        <label for="nombre">Nombre del quashtag:</label>
        <input type="text" id="nombre" name="nombre" value="#" required>
        <br>
        <br>
        <input type="submit" value="Crear quashtag">
    </form>
</body>
</html>