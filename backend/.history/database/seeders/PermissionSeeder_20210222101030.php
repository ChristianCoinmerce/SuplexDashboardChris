<?php

use App\Http\Models\Permission;
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $manageUser = new Permission();
        $manageUser->name = 'Manage users';
        $manageUser->save();

        $createTasks = new Permission();
        $createTasks->name = 'Create Tasks';
        $createTasks->save();
    }
}
