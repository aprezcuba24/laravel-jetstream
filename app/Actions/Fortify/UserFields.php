<?php

namespace App\Actions\Fortify;

trait UserFields
{
    protected function validateUserFields(): array
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'city_id' => ['required', 'exists:App\Models\City,id'],
            'phone_number' => ['nullable', 'numeric', 'digits:8'],
            'identity_card' => ['required', 'string', 'max:10'],
            'date_of_birth' => ['required', 'date', 'before_or_equal:' . now()->subYears(18)->format('Y-m-d')],
        ];
    }

    protected function updateUserFields(array $input): array
    {
        return [
            'name' => $input['name'],
            'city_id' => $input['city_id'],
            'phone_number' => $input['phone_number'],
            'identity_card' => $input['identity_card'],
            'date_of_birth' => $input['date_of_birth'],
        ];
    }
}