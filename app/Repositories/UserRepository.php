<?php

namespace App\Repositories;

use App\Models\User;
use App\Support\Response\OauthClientTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;

class UserRepository {

    use OauthClientTrait;

    /**
     * @param int|null $id
     * @return User|null
     */
    public function findById(
        ?int $id
    ) : ?User
    {
        return User::find($id);
    }

    /**
     * @return Collection|null
     */
    public function getAll() : ?Collection
    {
        return User::query()
            ->get();
    }

    /**
     * @param string $email
     * @return User|null
     */
    public function getByEmail(
        string $email
    ) : ?User
    {
        return User::query()
            ->where('email', $email)
            ->first();
    }

    /**
     * @param string $code
     * @return User|null
     */
    public function getByCode(
        string $code
    ) : ?User
    {
        return User::query()
            ->where('code', $code)
            ->first();
    }

    /**
     * @param User $user
     * @return bool
     */
    public function checkCodeRelevance(
        User $user
    ) : bool
    {
        if (Carbon::now()->diffInMinutes($user->code_created_at) > 5) {
            return false;
        }

        return true;
    }

    /**
     * @param User $user
     * @param string $password
     * @return User
     */
    public function setPassword(
        User $user,
        string $password
    ) : User {

        /** @var User $user */
        $user->update([
            'password'  => Hash::make($password)
        ]);

        return $user;
    }

    /**
     * @param User $user
     * @param string $code
     * @return User
     */
    public function setValidationCode(
        User $user,
        string $code
    ) : User
    {
        $user->update([
            'code'              => $code,
            'code_created_at'   => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        return $user;
    }

    /**
     * @param string $name
     * @param string $email
     * @param string $password
     * @return User|null
     */
    public function create(
        string $name,
        string $email,
        string $password
    ) : ?User
    {
        /** @var User $user */
        $user = User::create([
            'name'      => $name,
            'email'     => $email,
            'password'  => Hash::make($password)
        ]);

        /**
         * Trait function to make oAuth client credentials
         */
        if ($this->createClientForUser($user) === false) {
            return null;
        }

        return $user;
    }

}
