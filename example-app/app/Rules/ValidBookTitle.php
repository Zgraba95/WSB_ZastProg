<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidBookTitle implements ValidationRule
{
    /**
     * Uruchomienie reguły walidacji.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Sprawdzenie, czy tytuł jest równy "test" (niezależnie od wielkości liter)
        if (strtolower(trim($value)) === 'test') {
            $fail('Wprowadzony tytuł książki jest niedozwolony.');
        }
    }
}