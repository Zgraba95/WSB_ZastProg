<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidBookTitle;

class StoreBookRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            // Użycie własnej reguły ValidBookTitle
            'title'        => ['required', 'string', 'max:255', new ValidBookTitle()],
            'year'         => 'nullable|integer|between:1450,2100',
            'category'     => 'nullable|string',
            'description'  => 'nullable|string|max:2000',
            'is_available' => 'nullable|boolean',
            // Reguła zależna: shelf jest wymagane, gdy is_available ma wartość 1
            'shelf'        => 'required_if:is_available,1|nullable|string|max:50',
            // Walidacja tablicy i każdego z jej elementów
            'tags'         => 'nullable|array',
            'tags.*'       => 'nullable|string|max:30',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required'    => "Pole 'tytuł książki' jest wymagane.",
            'title.string'      => "Pole 'tytuł książki' musi być tekstem.",
            'title.max'         => "Pole 'tytuł książki' nie może przekraczać 255 znaków.",
            'year.integer'      => "Pole 'rok wydania' musi być liczbą całkowitą.",
            'year.between'      => "Wartość w polu 'rok wydania' musi znajdować się w przedziale od 1450 do 2100.",
            'description.max'   => "Pole 'opis książki' nie może przekraczać 2000 znaków.",
            // Własny komunikat dla reguły zależnej required_if
            'shelf.required_if' => 'Pole numer półki jest wymagane, gdy książka jest dostępna.',
            'tags.*.string'     => 'Tag musi być tekstem.',
            'tags.*.max'        => 'Pojedynczy tag nie może przekraczać 30 znaków.',
        ];
    }

    public function attributes(): array
    {
        return [
            'title'        => 'tytuł książki',
            'year'         => 'rok wydania',
            'category'     => 'kategoria',
            'description'  => 'opis książki',
            'is_available' => 'dostępność w bibliotece',
            'shelf'        => 'numer półki',
            'tags'         => 'tagi',
        ];
    }
}