<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zdjęcie</title>
</head>
<body>
    <p>
        To jest zdjęcie
        @if ($city)
            z {{ $city }}
        @else
            bez podanego miasta
        @endif
        zrobione na ulicy {{ $street }}.
    </p>
</body>
</html>