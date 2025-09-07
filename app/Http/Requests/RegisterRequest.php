<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'  => 'required|string|max:40',
            'phone' => 'required|string|digits_between:8,15',
        ];
    }

    public function attributes(): array
    {
        return [
            'name'  => 'Username',
            'phone' => 'Phonenumber',
        ];
    }

}
