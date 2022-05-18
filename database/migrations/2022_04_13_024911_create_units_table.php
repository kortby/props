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
            $table->integer('number_of_bedroom');
            $table->integer('number_of_bathroom');
            $table->integer('number_of_balcony');
            $table->date('date_available_from')->nullable();
            $table->boolean('is_active');
            $table->string('description')->nullable();
            $table->integer('unit_number');
            $table->integer('unit_floor_number');
            $table->integer('size');
            $table->string('price');

            $table->foreignId('unit_feature_id');
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
