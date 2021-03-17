<?php

use Illuminate\Database\Seeder;
use App\User;


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

        for ($i=0; $i < 1000; $i++) {
            $userData[] = [
                'name' => Str::random(10),
                'email' => Str::random(10).'@gmail.com',
                'password' => Hash::make('password'),
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ];
        }

        foreach ($userData as $user) {
            User::create($user);
        }
    }
}
