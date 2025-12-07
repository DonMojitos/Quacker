<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Listado Quashtags</title>
</head>
<body>
	<body>
	<table>
		<tr>
			<th>ID</th>
			<th>Quashtag</th>
		</tr>
		@foreach($quashtags as $quashtag)
			<tr>
				<td>{{ $quashtag->id }}</td>
				<td>{{ $quashtag->name }}</td>
				<td><a href="/quashtags/{{ $quashtag->id }}">Ver detalles</a></td>
				<td><a href="/quashtags/{{ $quashtag->id }}/edit">Editar</a></td>
				<td>
					<form action="/quashtags/{{ $quashtag->id }}" method="post">
						@method('DELETE')
						@csrf
						<button type="submit">Eliminar</button>
					</form>
				</td>
			</tr>
		@endforeach
	</table>
	<br>
	<p><a href="/quashtags/create">Crear un quashtag nuevo</a></p>
	</body>
</body>
</html>