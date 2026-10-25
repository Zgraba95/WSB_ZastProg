<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista książek</title>
</head>
<body>
    <h1>Lista książek</h1>

    @if (session('success'))
        <div style="color: green; font-weight: bold; margin-bottom: 15px;">
            {{ session('success') }}
        </div>
    @endif

    <p><a href="/books/create">+ Dodaj kolejną książkę</a></p>
</body>
</html>