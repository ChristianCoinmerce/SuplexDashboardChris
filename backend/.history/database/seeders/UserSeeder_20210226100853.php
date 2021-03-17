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
        $roles = [1,2,3,4,4,4,4];
        for ($i = 0; $i < 50; $i++) {
            $user = User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => Hash::make('password')
            ]);

            $user = User::create([
                'name' => 'George Dijk',
                'email' => 'george@gmail.com',
                'password' => 'bbbold123',
            ]);

            $user->roles()->attach($roles[array_rand($roles)]);


    }
}


}
