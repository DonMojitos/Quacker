<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quashtag seleccionado</title>
</head>
<body>
    <table>
		<tr>
			<th>ID</th>
			<th>Quashtag</th>
		</tr>
        <tr>
            <td>{{ $quashtag->id }}</td>
            <td>{{ $quashtag->name }}</td>
        </tr>
	</table>
</body>
</html>