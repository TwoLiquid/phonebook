<?php

namespace App\Http\Requests\Api\Auth;

use App\Http\Requests\Api\BaseRequest;

class LoginRequest extends BaseRequest
{
    public function rules() : array
    {
        return [
            'email'     => 'required|email|exists:users',
            'password'  => 'required|string'
        ];
    }

    public function messages() : array
    {
        return [
            'email.required'    => 'Необходимо ввести E-mail.',
            'email.email'       => 'Неверный формат E-mail\'а.',
            'email.exists'      => 'Пользователь с таким E-mail не найден.',
            'password.required' => 'Необходимо ввести пароль.',
            'password.string'   => 'Пароль должен быть строкой.',
        ];
    }
}
