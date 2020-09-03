<?php

use Illuminate\Database\Seeder;
use App\Repositories\UserRepository;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var UserRepository $userRepo */
        $userRepo = app(UserRepository::class);

        $user = $userRepo->create(
            'Pozdnyakov',
            'Max',
            'male',
            '+79255912122',
            'qwerty',
            'customer',
            true
        );
    }
}
