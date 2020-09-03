<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Requests\Api\Auth\RegistrationRequest;
use App\Repositories\UserRepository;

class AuthController extends BaseController
{
    /**
     * @param RegistrationRequest $request
     * @param UserRepository $userRepo
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(
        RegistrationRequest $request,
        UserRepository $userRepo
    )
    {
        $user = $userRepo->create(
            $request->input('name'),
            $request->input('email'),
            $request->input('password')
        );

        if ($user === null) {
            return $this->respondWithError('Не удалось создать пользователя.');
        }

        return $this->respondWithSuccess([],
            'Пользователь успешно создан.'
        );
    }

    /**
     * @param LoginRequest $request
     * @param UserRepository $userRepo
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(
        LoginRequest $request,
        UserRepository $userRepo
    )
    {
        $user = $userRepo->getByEmail(
            $request->input('email')
        );

        if ($user === null) {
            return $this->respondWithError('Пользователь с таким E-mail не зарегистрирован.');
        }

        if (!auth()->attempt([
            'email'     => $request->input('email'),
            'password'  => $request->input('password')
        ])) {
            return $this->respondWithError('Не удалось авторизовать пользователя.');
        }

        return $this->respondWithSuccess([
            'token'     => auth()->user()->createToken('authToken')->accessToken
        ] , 'Вы успешно вошли в систему.');
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->user()
            ->token()
            ->revoke();

        return $this->respondWithSuccess([],
            'Вы успешно вышли из системы.');
    }
}
