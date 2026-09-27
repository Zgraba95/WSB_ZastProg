<?php
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('strona_glowna');
});

Route::get('/witaj', function () {
    return 'Witaj w aplikacji!';
});

Route::get('/test', [TestController::class, 'index']);

Route::get('/users/{id}', function ($id) {
    return "Użytkownik o ID: {$id}";
});

Route::get('/photo/{city?}/{street?}', function ($city = null, $street = 'main') {
    return view('photo', [
        'city' => $city,
        'street' => $street,
    ]);
});

Route::get('/{wysokosc}/{szerokosc}/{glebokosc}', function ($wysokosc, $szerokosc, $glebokosc) {
    $pojemnosc = $wysokosc * $szerokosc * $glebokosc;

    return view('pojemnosc', [
        'wysokosc' => $wysokosc,
        'szerokosc' => $szerokosc,
        'glebokosc' => $glebokosc,
        'pojemnosc' => $pojemnosc,
    ]);
})->whereNumber(['wysokosc', 'szerokosc', 'glebokosc']);