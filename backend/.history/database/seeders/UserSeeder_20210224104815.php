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
    $roles = [1,4,5,7,7,7,7];
    for ($i = 0; $i < 50; $i++) {
        $user = User::create([
            'name' => $faker->name,
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password')
        ]);

        $user->roles()->attach($roles[array_rand($roles)]);

    }
}


}
