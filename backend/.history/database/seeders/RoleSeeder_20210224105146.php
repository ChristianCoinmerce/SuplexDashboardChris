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

    public function run(){
        $faker = Faker::create();
        $roles = [1,4,5,7,7,7,7];
        for ($i = 0; $i < 50; $i++) {
            $user = Role::create([
                'name' => "",
                'description' => $faker->email,
                'password' => Hash::make('password')
            ]);

            $user->roles()->attach($roles[array_rand($roles)]);

    }
}


}
