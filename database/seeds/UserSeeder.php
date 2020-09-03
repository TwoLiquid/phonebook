<?php

use Illuminate\Database\Seeder;
use App\Repositories\UserRepository;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        /** @var UserRepository $userRepo */
        $userRepo = app(UserRepository::class);

        for($i = 0; $i < 199; $i++) {
            $gender = mt_rand(0, 1);
            $blocked = mt_rand(0, 9);
            $status = mt_rand(0, 1);
            $role = mt_rand(0, 1);

            $userRepo->generate(
                $gender == 0 ? $faker->firstNameMale : $faker->firstNameFemale,
                $faker->lastName,
                $gender == 0 ? 'male' : 'female',
                $faker->phoneNumber,
                $faker->freeEmail,
                $faker->password,
                true,
                $blocked < 9 ? false : true,
                $blocked < 9 ? null : 'Test block',
                $role == 0 ? 'customer' : 'implementer',
                rand(0, 50) / 10,
                $status == 0 ? 'new' : 'middle'
            );
        }
    }
}
