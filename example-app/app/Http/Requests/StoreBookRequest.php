<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
{
    /**
     * Włączenie autoryzacji żądania.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Reguły walidacji.
     */
    public function rules(): array
    {
        return [
            'title'        => 'required|string|max:255',
            'year'         => 'nullable|integer|between:1450,2100',
            'category'     => 'nullable|string',
            'description'  => 'nullable|string|max:2000',
            'is_available' => 'nullable|boolean',
        ];
    }

    /**
     * Własne komunikaty błędów w języku polskim.
     */
    public function messages(): array
    {
        return [
            'title.required'  => "Pole 'tytuł książki' jest wymagane.",
            'title.string'    => "Pole 'tytuł książki' musi być tekstem.",
            'title.max'       => "Pole 'tytuł książki' nie może przekraczać 255 znaków.",
            'year.integer'    => "Pole 'rok wydania' musi być liczbą całkowitą.",
            'year.between'    => "Wartość w polu 'rok wydania' musi znajdować się w przedziale od 1450 do 2100.",
            'description.max' => "Pole 'opis książki' nie może przekraczać 2000 znaków.",
        ];
    }

    /**
     * Przyjazne nazwy atrybutów.
     */
    public function attributes(): array
    {
        return [
            'title'        => 'tytuł książki',
            'year'         => 'rok wydania',
            'category'     => 'kategoria',
            'description'  => 'opis książki',
            'is_available' => 'dostępność w bibliotece',
        ];
    }
}