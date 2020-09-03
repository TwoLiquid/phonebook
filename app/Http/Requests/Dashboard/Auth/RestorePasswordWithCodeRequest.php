<?php

namespace App\Http\Requests\Dashboard\Auth;

use App\Http\Requests\Dashboard\BaseRequest;

class RestorePasswordWithCodeRequest extends BaseRequest
{
    public function rules() : array
    {
        return [
            'code'              => 'required|string|exists:users,code',
            'password'          => 'required|string',
            'confirm_password'  => 'required|string'
        ];
    }

    public function messages() : array
    {
        return [
            'code.required'             => 'Необходимо ввести код для восстановления пароля.',
            'code.string'               => 'Код для восстановления пароля должен быть строкой',
            'code.exists'               => 'Введенный код для восстановления пароля не найден.',
            'password.required'         => 'Необходимо ввести пароль.',
            'password.string'           => 'Пароль должен быть строкой.',
            'confirm_password.required' => 'Необходимо ввести повторенный пароль.',
            'confirm_password.string'   => 'Повторенный пароль должен быть строкой.'
        ];
    }
}
