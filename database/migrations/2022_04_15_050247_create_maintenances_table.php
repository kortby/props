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
        Schema::create('maintenances', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('status');
            $table->unsignedBigInteger('unit_id')->nullable();
            $table->string('description');
            $table->unsignedBigInteger('category_id');
            $table->string('proirity');
            $table->date('due_date')->nullable();
            $table->dateTime('preferred_maintenece_time')->nullable();
            $table->string('frequency');
            $table->date('finished')->nullable();
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
        Schema::dropIfExists('maintenances');
    }
};
