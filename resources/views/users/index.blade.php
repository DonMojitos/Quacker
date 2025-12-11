<!DOCTYPE html>
<html>
<head><title>Lista de Usuarios</title></head>
<body>
    <h1>Usuarios Quacker</h1>
    <a href="/users/create">Crear Nuevo Usuario</a>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Usuario</th>
            <th>Email</th>
            <th>Acciones</th>
        </tr>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->usuario }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <a href="/users/{{ $user->id }}">Ver</a>
                <a href="/users/{{ $user->id }}/edit">Editar</a>
                <form action="/users/{{ $user->id }}" method="POST" style="display:inline">
                    @csrf @method('DELETE')
                    <button type="submit">Borrar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>