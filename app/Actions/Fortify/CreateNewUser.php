<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Merchandizer; // Add this import
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
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'role' => ['required'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : ''
        ])->validate();

        // Create the user
        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'role' => $input['role'],
        ]);

        // If the role is 3, create a corresponding merchandizer
        if ($input['role'] == 3) {
            $merchandizer = Merchandizer::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
                'role' => $input['role'],

                //location and logo is nullable
                'location' => $input['location'] ?? '',
                'logo' => $input['logo'] ?? '',


                

                // Add other necessary fields for merchandizer creation here
            ]);

            // Link the user to the merchandizer
            $user->merchandizer_id = $merchandizer->id;
            $user->save();
        }

        return $user;
    }
}
