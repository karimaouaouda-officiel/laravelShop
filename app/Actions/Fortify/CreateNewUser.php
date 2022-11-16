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
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        if($input['role'] == 'seller'){
            Validator::make($input , [
                'phone_number' => ['require'],
            ]);
        } 

        if($input['role'] != "admin" && $input['role'] != "seller"){
            $input['role'] = "client";
        }

        return User::create([
            'firstname'    => $input['firstname'],
            'lastname'     => $input['lastname'],
            'name'         => $input['firstname']." ".$input['lastname'],
            'email'        => $input['email'],
            'role'         => $input['role'],
            'phone_number' => $input['phone_number'] ?? "",
            'country'      => $input['country'] ?? "",
            'password'     => Hash::make($input['password']),
        ]);
    }
}
