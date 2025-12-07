<!DOCTYPE html>
<html>
<body>
    <h1>Detalle de {{ $user->usuario }}</h1>
    <p><strong>ID:</strong> {{ $user->id }}</p>
    <p><strong>Nombre Real:</strong> {{ $user->nombre }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <a href="/users">Volver al listado</a>
</body>
</html>