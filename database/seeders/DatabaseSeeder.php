<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Http\Controllers\CategoryController;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        $this->call([
            RoleSeeder::class,
            userseeder::class,
            CategorySeeder::class,
            postseeder::class,
            TegSeeder::class,

        ]);

    }
}
