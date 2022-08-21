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
        Schema::create('units', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('unit_heading');
            $table->integer('number_of_bedroom');
            $table->integer('number_of_bathroom');
            $table->integer('number_of_balcony');
            $table->date('date_available_from')->nullable();
            $table->boolean('is_active');
            $table->text('description')->nullable();
            $table->integer('unit_number');
            $table->integer('unit_floor_number');
            $table->integer('size');
            $table->float('price');

            $table->boolean('is_air_conditioning');
            $table->integer('parking_spot');
            $table->boolean('has_carpet');
            $table->boolean('has_hardwood_flooring');
            $table->boolean('is_ceiling_fan_cooling');
            $table->boolean('has_in_unit_fireplace');
            $table->boolean('has_in_unit_garden');
            $table->boolean('has_in_unit_laundry');
            $table->boolean('has_walkin_closet');
            $table->boolean('are_pets_allowed');

            $table->foreignId('property_id');
            $table->foreignId('unit_type_id');
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
        Schema::dropIfExists('units');
    }
};
