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
            $table->unsignedBigInteger('proberty_id');
            $table->foreignId('type_id');
            $table->integer('number_of_bedroom');
            $table->integer('number_bathroom');
            $table->integer('number_of_balcony');
            $table->dateTime('date_available_from')->nullable();
            $table->boolean('is_active');
            $table->string('unit_desription');
            $table->boolean('carpet_area');
            $table->integer('unit_number');
            $table->integer('unit_floor_number');
            $table->timestamps();

            $table->foreign('proberty_id')->references('id')->on('properties')->onDelete('cascade');
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
