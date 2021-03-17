<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('logo')->nullable();
            $table->string('banner')->nullable();
            $table->string('port')->nullable();
            $table->string('lat')->nullable();
            $table->string('long')->nullable();
            $table->string('ranking')->nullable();
            $table->string('street')->nullable();
            $table->string('house_number')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('phone_countrycode')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('email')->unique();
            $table->string('website')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('iban_name')->nullable();
            $table->string('iban_number')->nullable();
            $table->string('bic_swift')->nullable();
            $table->string('contact_name')->nullable();
            $table->string('category')->nullable();
            $table->string('subcategory')->nullable();
            $table->string('language')->nullable();
            $table->string('opening_days')->nullable();
            $table->string('opening_hours_start')->nullable();
            $table->string('opening_hours_end')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forms');
    }
}
