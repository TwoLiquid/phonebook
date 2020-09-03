<?php

use Illuminate\Database\Seeder;
use App\Repositories\CategoryRepository;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'title'         => 'Место',
                'description'   => null
            ],
            [
                'title'         => 'Очередь',
                'description'   => null
            ],
            [
                'title'         => 'Парковка',
                'description'   => null
            ]
        ];

        /** @var CategoryRepository $categoryRepo */
        $categoryRepo = app(CategoryRepository::class);

        foreach ($categories as $category) {
            $category = $categoryRepo->create(
                $category['title'],
                $category['description']
            );
        }
    }
}
