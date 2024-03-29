<?php

namespace App\Actions\Fortify;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make($input, [
            // 'name' => ['required', 'string', 'max:255'],
            // 'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            // 'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
            'username' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($user->id)],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'laundryname' => ['required', 'string', 'max:255'],
            'phonenumber' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
        ])->validateWithBag('updateProfileInformation');

        // if (isset($input['photo'])) {
        //     $user->updateProfilePhoto($input['photo']);
        // }

        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                // 'name' => $input['name'],
                // 'email' => $input['email'],
                'username' => $input['username'],
                'email' => $input['email'],
                'laundryname' => $input['laundryname'],
                'role' => "User",
                'phonenumber' => $input['phonenumber'],
                'address' => $input['address'],
            ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill([
            'username' => $input['username'],
            'email' => $input['email'],
            'laundryname' => $input['laundryname'],
            'role' => "User",
            'phonenumber' => $input['phonenumber'],
            'address' => $input['address'],
            'password' => Hash::make($input['password']),
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
