<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersRolesTable extends Migration
{
    public function up()
    {
        Schema::create('users_roles', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('role_id');

         //foreign key congraints
           $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
           $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');

         //primary key
           $table->primary(['user_id','role_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('users_roles');
    }
}
