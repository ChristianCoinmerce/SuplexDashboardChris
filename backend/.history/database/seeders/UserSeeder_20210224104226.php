<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
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
    public function run(){
    $roles = [1,4,5,7];
    for ($i = 0; $i < 4; $i++) {
        $user = User::create([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password')
        ]);

        $user->roles()->attach([1]);
    }
}


}
