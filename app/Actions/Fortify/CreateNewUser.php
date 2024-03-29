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

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'laundryname' => ['required', 'string', 'max:255'],
            'phonenumber' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return User::create([
            'username' => $input['username'],
            'email' => $input['email'],
            'laundryname' => $input['laundryname'],
            'role' => "User",
            'phonenumber' => $input['phonenumber'],
            'address' => $input['address'],
            'password' => Hash::make($input['password']),
            'deadline' => now(),
        ]);
    }
}
