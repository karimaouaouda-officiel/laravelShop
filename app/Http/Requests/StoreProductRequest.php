<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\File;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return (Auth::check() && (Auth::user()->role == "seller"  ));
    }

    protected $stopOnFirstFailure = true;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => "required|max:255",
            'description' =>  "required|max:1000",
            'price' => "required",
            'pic' => File::types(['jpeg' , 'jpg' , 'png' , 'ico'])
        ];
    }
}
