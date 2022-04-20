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
            $table->id();
            $table->string('unit_heading');
            $table->unsignedBigInteger('property_id')->nullable();
            $table->unsignedBigInteger('unit_type_id')->nullable();
            $table->integer('number_of_bedroom');
            $table->integer('number_of_bathroom');
            $table->integer('number_of_balcony');
            $table->date('date_available_from')->nullable();
            $table->boolean('is_active');
            $table->string('desription')->nullable();
            $table->boolean('carpet_area');
            $table->integer('unit_number');
            $table->integer('unit_floor_number');
            $table->integer('size');
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
        Schema::dropIfExists('units');
    }
};
