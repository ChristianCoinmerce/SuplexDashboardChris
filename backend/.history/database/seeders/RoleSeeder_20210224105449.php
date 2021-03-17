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
            $user = Role::create(
                ['name' => "Admin",
                'description' => "Highest Role",],
                ['name' => "Moderator",
                'description' => "Below Admin",],
                ['name' => "Staff",
                'description' => "Posts Control Only",],
                ['name' => "User",
                'description' => "Below Admin",]);


    }
}


}
