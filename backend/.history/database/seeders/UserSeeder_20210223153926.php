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

        factory(App\User::class,3)->create();

   $roles = factory(App\Role::class,3)->create();

   App\User::All()->each(function ($user) use ($roles){
      $user->roles()->saveMany($roles);
   });
        }

        foreach ($userData as $user) {

            App\User::All()->each(function ($user) use ($roles){
                $user->roles()->saveMany($roles);
             });

            User::create($user);

        }
    }
}
