<!DOCTYPE html>
<html>
<head><title>Editar Usuario</title></head>
<body>
    <h1>Editar a {{ $user->usuario }}</h1>
    <form action="/users/{{ $user->id }}" method="POST">
        @csrf @method('PATCH')
        <label>Nombre:</label> <input type="text" name="nombre" value="{{ $user->nombre }}" required maxlength="50"><br>
        <label>Usuario:</label> <input type="text" name="usuario" value="{{ $user->usuario }}" required maxlength="50"><br>
        <label>Email:</label> <input type="email" name="email" value="{{ $user->email }}" required maxlength="120"><br>
        <button type="submit">Actualizar</button>
    </form>
</body>
</html>