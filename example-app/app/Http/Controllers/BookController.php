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

    public function index()
    {
        return view('books.index');
    }
}