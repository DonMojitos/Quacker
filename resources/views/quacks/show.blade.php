<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quacks</title>
</head>
<body>
    <main>
        <article>
            <h3>{{ $quack->user_id->user }} ({{ $quack->created_at }})</h3>
            <p>{{ $quack->contenido }}</p>
            <p><a href="/quacks">Volver</a></p>
        </article>
    </main>
</body>
</html>
