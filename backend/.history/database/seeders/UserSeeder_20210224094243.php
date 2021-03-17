<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UserSeeder extends Seeder
{

    private $userData = [];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
{
    $roles = [1,2,3]; //here you need to add id roles from the DB
    for ($i = 0; $i < 3; $i++) {
        $user = User::create([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password')
        ]);

        // first variant
        $user->roles()->attach($roles[$i % count($a);])
    }
}


}
