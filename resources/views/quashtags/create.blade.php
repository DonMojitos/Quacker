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
        <label for="name">Nombre del quashtag:</label>
        <input type="text" id="name" name="name" value="#" required>
        <br>
        <br>
        <input type="submit" value="Crear quashtag">
    </form>
</body>
</html>