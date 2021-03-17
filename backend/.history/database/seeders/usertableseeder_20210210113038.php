<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
class usertableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    User::factory()
            ->count(50)
            ->hasRoles(1)
            ->create();
    }
}
