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
        Schema::create('unit_features', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_air_conditioning');
            $table->integer('num_of_assigned_car_parking');
            $table->boolean('has_carpet');
            $table->boolean('has_hardwood_flooring');
            $table->boolean('is_ceiling_fan_cooling');
            $table->boolean('has_in_unit_fireplace');
            $table->boolean('has_in_unit_garden');
            $table->boolean('has_in_unit_laundry');
            $table->boolean('has_walkin_closet');
            $table->boolean('are_pets_allowed');
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
        Schema::dropIfExists('unit_features');
    }
};
