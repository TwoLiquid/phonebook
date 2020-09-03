<?php

namespace App\Http\Requests\Dashboard\Contact;

use App\Http\Requests\Dashboard\BaseRequest;

class UpdateRequest extends BaseRequest
{
    public function rules() : array
    {
        return [
            'name'      => 'required|string',
            'phone'     => 'required|string|unique:contacts,phone,' . $this->route('id'),
            'favorite'  => 'boolean|nullable'
        ];
    }

    public function messages() : array
    {
        return [
            'name.required'     => 'Необходимо ввести имя контакта.',
            'name.string'       => 'Имя контакта должно быть строкой.',
            'phone.required'    => 'Необходимо ввести телефонный номер контакта.',
            'phone.email'       => 'Номер контакта должен быть строкой.',
            'phone.unique'      => 'Контакт с таким номером телефона уже зарегистрирован.',
            'favorite.boolean'  => 'Флаг избранного контакта должен быть будевым значением.'
        ];
    }
}
