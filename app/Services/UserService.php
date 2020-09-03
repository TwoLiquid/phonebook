<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;
use Carbon\Carbon;

class UserService {

    /**
     * @param User $user
     * @param string $code
     * @return bool
     */
    public function checkCodeIdentity(
        User $user,
        string $code
    ) : bool
    {
        if ($user->code == $code) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param User $user
     * @param string $code
     * @return bool
     */
    public function checkRegistrationCodeRelevance(
        User $user,
        string $code
    ) : bool
    {
        if (Carbon::now()->diffInMinutes($user->code_created_at) > 5) {
            return false;
        }

        return true;
    }

    /**
     * @param User $user
     * @return bool
     */
    public function checkActivated(
        User $user
    ) : bool
    {
        return $user->activated;
    }
}
