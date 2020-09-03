<?php

namespace App\Support\Response;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

trait OauthClientTrait {

    /**
     * @param User $user
     * @return bool|null
     */
    protected function createClientForUser(
        User $user
    ) : bool
    {
        $oauthClientExistence = DB::table('oauth_clients')->where('user_id', $user->id)
            ->first();

        if ($oauthClientExistence === null) {
            $oauthClientId = DB::table('oauth_clients')->insertGetId(
                [
                    'user_id' => $user->id,
                    'name' => $user->name,
                    'secret' => generateRandomString(true, true, 40),
                    'redirect' => '',
                    'personal_access_client' => 1,
                    'password_client' => 0,
                    'revoked' => 0,
                    'created_at' => Carbon::now()->toDateTime(),
                    'updated_at' => Carbon::now()->toDateTime()
                ]
            );

            return DB::table('oauth_personal_access_clients')->insert([
                'client_id' => $oauthClientId,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        } else {
            return false;
        }
    }
}
