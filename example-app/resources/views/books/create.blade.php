<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj książkę</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="number"], select, textarea {
            width: 340px;
            padding: 6px;
            box-sizing: border-box;
        }
        .checkbox-group label {
            display: inline;
            font-weight: normal;
        }
        /* Czerwone pole na samej górze */
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            border-radius: 4px;
            padding: 12px 18px;
            margin-bottom: 20px;
            max-width: 500px;
        }
        .alert-danger h4 {
            margin: 0 0 8px 0;
            font-size: 16px;
        }
        .alert-danger ul {
            margin: 0;
            padding-left: 20px;
        }
        /* Czerwone komunikaty bezpośrednio pod polami */
        .field-error {
            color: #dc3545;
            font-size: 13px;
            margin-top: 4px;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <h1>Dodaj nową książkę</h1>

    {{-- Zbiorcze pole błędów na samej górze --}}
    @if ($errors->any())
        <div class="alert-danger">
            <h4>Proszę poprawić błędy w formularzu</h4>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/books" method="POST">
        @csrf

        {{-- Pole: Tytuł książki --}}
        <div class="form-group">
            <label for="title">Tytuł książki:</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" placeholder="np. Limes inferior">
            @error('title')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        {{-- Pole: Rok wydania --}}
        <div class="form-group">
            <label for="year">Rok wydania:</label>
            <input type="number" id="year" name="year" value="{{ old('year') }}" placeholder="np. 1982">
            @error('year')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        {{-- Pole: Kategoria --}}
        <div class="form-group">
            <label for="category">Kategoria:</label>
            <select id="category" name="category">
                <option value="Literatura piękna" {{ old('category') == 'Literatura piękna' ? 'selected' : '' }}>Literatura piękna</option>
                <option value="Sci-Fi / Fantasy" {{ old('category') == 'Sci-Fi / Fantasy' ? 'selected' : '' }}>Sci-Fi / Fantasy</option>
                <option value="Biografie" {{ old('category') == 'Biografie' ? 'selected' : '' }}>Biografie</option>
                <option value="Naukowe" {{ old('category') == 'Naukowe' ? 'selected' : '' }}>Naukowe</option>
            </select>
        </div>

        {{-- Pole: Opis książki --}}
        <div class="form-group">
            <label for="description">Opis książki:</label>
            <textarea id="description" name="description" rows="4" placeholder="Krótki opis fabuły...">{{ old('description') }}</textarea>
        </div>

        {{-- Pole: Dostępność w bibliotece --}}
        <div class="form-group checkbox-group">
            <input type="checkbox" id="is_available" name="is_available" value="1" {{ old('is_available') ? 'checked' : '' }}>
            <label for="is_available">Dostępność w bibliotece</label>
        </div>

        <button type="submit">Zapisz książkę</button>
    </form>
</body>
</html>