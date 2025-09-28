<?php

namespace Learnify\BackOffice\User\Infrastructure\Validators;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id' => 'required',
            'username' => 'required|min:4|max:30',
            'email' => 'required|email|min:3|max:255',
        ];
    }

}
