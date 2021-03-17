<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{

    private $userData = [];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $faker = Faker::create();
        $roles = [0,1,1,1,2,2,2,2,3,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4];
        $user1 = User::create([
            'name' => 'George Dijk',
            'email' => 'george@gmail.com',
            'password' => '$2y$10$/26q3fUaM9yWa/5mxRzwkeRhHVdvAw/Em5iUjmPI5tsJmVYLhJRia',
        ]);
        $user1->roles()->attach($roles[0]);
        for ($i = 0; $i < 50; $i++) {
            $user = User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => Hash::make('password')
            ]);
            $user->roles()->attach($roles[array_rand($roles)]);
        }
    }


}
