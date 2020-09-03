<?php

namespace App\Support\Transformers\Api;

use App\Models\User;
use App\Support\Transformers\BaseTransformer;

class UserTransformer extends BaseTransformer
{
    public function transform(User $user) : array
    {
        return [
            'id'                => $user->id,
            'name'              => $user->name,
            'email'             => $user->email,
        ];
    }

    /**
     * @return string
     */
    public function getItemKey() : string
    {
        return 'user';
    }

    /**
     * @return string
     */
    public function getCollectionKey() : string
    {
        return 'users';
    }
}
