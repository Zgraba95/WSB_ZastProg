<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        // 1. Pobranie pojedynczej wartości dla pola title
        $title = $request->input('title');

        // 2. Pobranie pełnej tablicy wszystkich przesłanych pól
        $allData = $request->all();

        // 3. Pobranie wyłącznie podzbioru pól obejmującego title oraz category
        $subsetData = $request->only(['title', 'category']);

        // Przekierowanie na adres /books z komunikatem zawierającym odebrane dane
        return redirect('/books')->with(
            'success',
            "Odebrano dane metodą POST! Tytuł: {$title}, Kategoria: {$subsetData['category']}, Rok: {$allData['year']}"
        );
    }

    // Wyświetlenie formularza edycji z przykładowymi danymi książki
    public function edit($id)
    {
        $book = [
            'id' => $id,
            'title' => 'Limes inferior',
            'year' => 1982,
            'category' => 'Sci-Fi / Fantasy',
            'description' => 'Klasyka polskiej fantastyki socjologicznej autorstwa Janusza Zajdla.',
            'is_available' => true,
        ];

        return view('books.edit', compact('book'));
    }

    // Obsługa emulowanej metody PUT
    public function update(Request $request, $id)
    {
        $title = $request->input('title');
        $year = $request->input('year');

        // Przekierowanie na listę z komunikatem
        return redirect('/books')->with('success', "Zaktualizowano książkę o ID: {$id} (Tytuł: {$title}, Rok: {$year})");
    }

    // Obsługa emulowanej metody DELETE
    public function destroy($id)
    {
        return redirect('/books')->with('success', "Książka o ID: {$id} została pomyślnie usunięta.");
    }
    
    public function index()
    {
        return view('books.index');
    }
}