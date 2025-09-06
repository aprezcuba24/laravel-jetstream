<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;
    use UserFields;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            ...$this->validateUserFields(),
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'identifier' => ['required', 'numeric', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        $user = User::create([
            ...$this->updateUserFields($input),
            'email' => $input['email'],
            'identifier' => $input['identifier'],
            'password' => Hash::make($input['password']),
        ]);
        $user->assignRole('User');

        return $user;
    }
}
