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
        // Walidacja danych wejściowych
        $validated = $request->validate([
            'title'        => 'required|string|max:255',
            'year'         => 'nullable|integer|between:1450,2100',
            'description'  => 'nullable|string|max:2000',
            'is_available' => 'nullable|boolean',
        ]);

        return redirect('/books')->with(
            'success',
            "Walidacja przeszła pomyślnie! Dodano książkę: {$validated['title']}"
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