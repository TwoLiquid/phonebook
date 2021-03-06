<?php

namespace App\Http\Requests\Dashboard\Auth;

use App\Http\Requests\Dashboard\BaseRequest;

class RegistrationRequest extends BaseRequest
{
    public function rules() : array
    {
        return [
            'name'              => 'required|string',
            'email'             => 'required|email|unique:users',
            'password'          => 'required|string',
            'confirm_password'  => 'required|string'
        ];
    }

    public function messages() : array
    {
        return [
            'name.required'             => 'Необходимо ввести имя.',
            'name.string'               => 'Имя должно быть строкой.',
            'email.required'            => 'Необходимо ввести E-mail.',
            'email.email'               => 'Неверный формат E-mail\'а.',
            'email.unique'              => 'Пользователь с таким E-mail уже зарегистрирован.',
            'password.string'           => 'Пароль должен быть строкой.',
            'password.required'         => 'Необходимо ввести пароль.',
            'confirm_password.required' => 'Необходимо ввести повторенный пароль.',
            'confirm_password.string'   => 'Повторенный пароль должен быть строкой.'
        ];
    }
}
