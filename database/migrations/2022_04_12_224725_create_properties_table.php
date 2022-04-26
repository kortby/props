<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('total_floors');
            $table->integer('number_of_units');
            $table->integer('property_type_id')->nullable();
            $table->string('description')->nullable();
            $table->boolean('has_fitness_center');
            $table->boolean('has_swimming_pool');
            $table->boolean('has_laundry');
            $table->boolean('has_wheelchair_accessibilty');
            $table->boolean('has_intercom_facility');
            $table->boolean('has_power_backup');
            $table->boolean('has_main_door_security');
            $table->integer('number_of_elevators');
            $table->string('address_line_1');
            $table->string('address_line_2')->nullable();
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->integer('postal_code');
            $table->string('phone');
            $table->foreignId('company_id')->constrained();
            $table->foreignId('user_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
};
