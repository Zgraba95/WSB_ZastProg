<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj książkę</title>
</head>
<body>
    <h1>Dodaj nową książkę</h1>

    <form action="/books" method="POST">
        @csrf
        <div>
            <label for="title">Tytuł książki:</label>
            <input type="text" id="title" name="title" placeholder="np. Władca Pierścieni" required>
        </div>
        <br>
        <button type="submit">Zapisz książkę</button>
    </form>
</body>
</html>