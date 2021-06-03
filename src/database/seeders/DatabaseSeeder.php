<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        User::factory(10)->create();
        User::create([
            'name' => 'xman',
            'email' => 'xman@mail.ru',
            'password' => '$2y$10$25k9PqhEe/CKTH3D38mqSu9xVUvLLQW/VqvmqQ/p9tQb8IaxGP6v.',
        ]);
        $this->call(ProductSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(CategoryProductSeeder::class);
    }
}
