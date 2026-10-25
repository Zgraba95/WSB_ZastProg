<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edycja książki</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; font-weight: bold; margin-bottom: 5px; }
        input[type="text"], input[type="number"], select, textarea {
            width: 320px; padding: 6px; box-sizing: border-box;
        }
        .checkbox-group label { display: inline; font-weight: normal; }
        .delete-box { margin-top: 30px; padding-top: 20px; border-top: 1px solid #ccc; }
        button.btn-delete { background-color: #dc3545; color: white; border: none; padding: 8px 16px; cursor: pointer; }
    </style>
</head>
<body>
    <h1>Edycja książki</h1>

    <!-- Formularz edycji (PUT) -->
    <form action="/books/{{ $book['id'] }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Tytuł książki:</label>
            <input type="text" id="title" name="title" value="{{ old('title', $book['title']) }}" required>
        </div>

        <div class="form-group">
            <label for="year">Rok wydania:</label>
            <input type="number" id="year" name="year" value="{{ old('year', $book['year']) }}" required>
        </div>

        <div class="form-group">
            <label for="category">Kategoria:</label>
            <select id="category" name="category" required>
                @php
                    $selectedCategory = old('category', $book['category']);
                @endphp
                <option value="Literatura piękna" {{ $selectedCategory == 'Literatura piękna' ? 'selected' : '' }}>Literatura piękna</option>
                <option value="Sci-Fi / Fantasy" {{ $selectedCategory == 'Sci-Fi / Fantasy' ? 'selected' : '' }}>Sci-Fi / Fantasy</option>
                <option value="Biografie" {{ $selectedCategory == 'Biografie' ? 'selected' : '' }}>Biografie</option>
                <option value="Naukowe" {{ $selectedCategory == 'Naukowe' ? 'selected' : '' }}>Naukowe</option>
            </select>
        </div>

        <div class="form-group">
            <label for="description">Opis książki:</label>
            <textarea id="description" name="description" rows="4">{{ old('description', $book['description']) }}</textarea>
        </div>

        <div class="form-group checkbox-group">
            <input type="checkbox" id="is_available" name="is_available" value="1" {{ old('is_available', $book['is_available']) ? 'checked' : '' }}>
            <label for="is_available">Dostępność w bibliotece</label>
        </div>

        <button type="submit">Zaktualizuj książkę</button>
    </form>

    <!-- Osobny formularz usuwania (DELETE) -->
    <div class="delete-box">
        <form action="/books/{{ $book['id'] }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-delete">Usuń książkę</button>
        </form>
    </div>
</body>
</html>