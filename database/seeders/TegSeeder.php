<?php

namespace Database\Seeders;

use App\Models\Teg;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TegSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags=[
            ['name'=>'Design'],
            ['name'=>'Marketing'],
            ['name'=>'SED'],
            ['name'=>'Writing'],
            ['name'=>'Development'],
            ['name'=>'Reading'],
        ];

        Teg::insert($tags);
    }
}
