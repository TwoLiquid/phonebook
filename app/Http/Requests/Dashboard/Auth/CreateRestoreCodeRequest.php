<?php

namespace App\Http\Requests\Dashboard\Auth;

use App\Http\Requests\Dashboard\BaseRequest;

class CreateRestoreCodeRequest extends BaseRequest
{
    public function rules() : array
    {
        return [
            'email'     => 'required|email|exists:users'
        ];
    }

    public function messages() : array
    {
        return [
            'email.required'            => 'Необходимо ввести E-mail.',
            'email.email'               => 'Неверный формат E-mail\'а.',
            'email.exists'              => 'Пользователь с таким E-mail не найден.'
        ];
    }
}
