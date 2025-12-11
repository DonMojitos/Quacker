<!DOCTYPE html>
<html>
<head><title>Crear Usuario</title></head>
<body>
    <h1>Nuevo Usuario</h1>
    <form action="/users" method="POST">
        @csrf
        <label>Nombre:</label> <input type="text" name="name" required maxlength="50"><br>
        <label>Usuario:</label> <input type="text" name="usuario" required maxlength="50"><br>
        <label>Email:</label> <input type="email" name="email" required maxlength="120"><br>
        <label>Contraseña:</label> <input type="password" name="password" required maxlength="120"><br>
        <button type="submit">Guardar</button>
    </form>
</body>
</html>