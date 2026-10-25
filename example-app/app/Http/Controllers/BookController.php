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
        $title = $request->input('title');

        return redirect('/books')->with('success', "Formularz odebrany! Dodano książkę: {$title}");
    }

    public function index()
    {
        return view('books.index');
    }
}