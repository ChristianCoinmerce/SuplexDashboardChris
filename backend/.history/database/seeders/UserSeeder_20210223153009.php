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
    public function run()
    {

        for ($i=0; $i < 3; $i++) {
            $userData[] = [
                'name' => Str::random(10),
                'email' => Str::random(10).'@gmail.com',
                'password' => Hash::make('password')

            ];
        }

        foreach ($userData as $user) {
            $validated = $request->validated();
            $password = Hash::make($validated["password"]);
            $array = collect($request->validated())->forget(['password'])->put('password',$password)->all();
            $user = User::create($array);
            $roles = $validated['role_id'];
            $user->roles()->attach($roles);


            User::create($user);

        }
    }
}
