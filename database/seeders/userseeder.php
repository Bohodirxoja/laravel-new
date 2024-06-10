<?php

namespace Database\Seeders;

use App\Models\User;
use \Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class userseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $user= User::create([
            'name'=>'Ali',
            'email'=>'jon@exampl.com',
            'password'=> Hash::make('samol'),
        ]);

       $user->roles()->attach([1,3]);

        $user2= User::create([
            'name'=>'Vali',
            'email'=>'Vali@exampl.com',
            'password'=> Hash::make('Qale'),
        ]);

        $user2->roles()->attach([2]);

//        \App\Models\User::factory(10)->create();
    }
}
