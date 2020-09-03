<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\Dashboard\Auth\LoginRequest;
use App\Http\Requests\Dashboard\Auth\RegistrationRequest;
use App\Http\Requests\Dashboard\Auth\CreateRestoreCodeRequest;
use App\Http\Requests\Dashboard\Auth\RestorePasswordWithCodeRequest;
use App\Notifications\UserPasswordRestore;
use App\Repositories\UserRepository;

class AuthController extends BaseController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function login()
    {
        return view('dashboard.auth.login');
    }

    /**
     * @param LoginRequest $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function authenticate(
        LoginRequest $request
    )
    {
        if (
            auth('dashboard')->attempt(
                $request->only('email', 'password')
            ) === false
        ) {
            return $this->error('Неверный логин или пароль.');
        }

        return redirect()->route('contacts');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        auth('dashboard')->logout();

        return redirect()->route('login');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function register()
    {
        return view('dashboard.auth.register');
    }

    /**
     * @param RegistrationRequest $request
     * @param UserRepository $userRepo
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse]
     */
    public function store(
        RegistrationRequest $request,
        UserRepository $userRepo
    )
    {
        if ($request->input('password') != $request->input('confirm_password')) {
            return $this->error(
                'Пароли не совпадают.',
                route('register')
            );
        }

        $user = $userRepo->create(
            $request->input('name'),
            $request->input('email'),
            $request->input('password')
        );

        if ($user === null) {
            return $this->error(
                'Не удалось создать пользователя.',
                route('register')
            );
        }

        if (
            auth('dashboard')->attempt(
                $request->only('email', 'password')
            ) === false
        ) {
            return $this->error('Неверный логин или пароль.');
        }

        return redirect()->route('dashboard');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function restore()
    {
        return view('dashboard.auth.restore');
    }

    /**
     * @param CreateRestoreCodeRequest $request
     * @param UserRepository $userRepo
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createRestoreCode(
        CreateRestoreCodeRequest $request,
        UserRepository $userRepo
    )
    {
        $user = $userRepo->getByEmail(
            $request->input('email')
        );

        $userRepo->setValidationCode(
            $user,
            generateRandomString(false, false, true, 4)
        );

        $user->notify(new UserPasswordRestore($user->code));

        return view('dashboard.auth.code');
    }

    /**
     * @param RestorePasswordWithCodeRequest $request
     * @param UserRepository $userRepo
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function changePassword(
        RestorePasswordWithCodeRequest $request,
        UserRepository $userRepo
    )
    {
        $user = $userRepo->getByCode(
            $request->input('code')
        );

        if ($user === null) {
            return $this->error(
                'Нет пользователя c таким кодом восстановления.',
                route('register')
            );
        }

        if (!$userRepo->checkCodeRelevance($user)
        ) {
            return $this->error('Код восстановления пароля устарел.');
        }

        if ($request->input('password') != $request->input('confirm_password')) {
            return $this->error(
                'Пароли не совпадают.',
                route('register')
            );
        }

        $userRepo->setPassword(
            $user,
            $request->input('password')
        );

        return redirect()->route('login');
    }
}
