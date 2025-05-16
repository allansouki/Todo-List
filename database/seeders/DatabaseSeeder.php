<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use Database\Factories\CategoryFactory;
use Database\Factories\UserFactory;
use Database\Factories\TaskFactory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

       $this->call([
      //  UserSeeder::class,
       // CategoryFactory::class,
       ]);

       UserFactory::new()->count(40)->create();
       CategoryFactory::new()->count(30)->create();
       TaskFactory::new()->count(100)->create();

    }
}
