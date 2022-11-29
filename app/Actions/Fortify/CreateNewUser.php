<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Illuminate\Http\Request;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  Request  $input
     * @return \App\Models\User
     */
    public function create(Request $req)
    {
        $req->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ]);

        $input = $req->all();

        if($input['role'] == 'seller'){
            $req->validate([
                'phone_number' => ['required'],
            ]);
        }else{
            $input['phone_number'] = User::all()->count()+1;
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
            'phone_number' => $input['phone_number'],
            'country'      => $input['country'] ?? "",
            'password'     => Hash::make($input['password']),
        ]);
    }
}
