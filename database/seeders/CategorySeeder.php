<?php

namespace Database\Seeders;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Controller;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['name' => 'Web Design']);
        Category::create(['name' => 'Web Development']);
        Category::create(['name' => 'Online Marketing']);
        Category::create(['name' => 'Keyword Research']);
        Category::create(['name' => 'Email Marketin']);

    }
}
