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
            $table->string('status')->default('new');
            $table->foreignId('unit_id')->nullable();
            $table->string('description');
            $table->foreignId('category_id');
            $table->string('phone');
            $table->string('proirity')->default('high');
            $table->date('due_date')->nullable();
            $table->dateTime('preferred_maintenece_time')->nullable();
            $table->string('frequency')->default('onetime');
            $table->string('cost')->default(0);
            $table->string('access_code')->nullable();
            $table->date('finished')->nullable();
            $table->boolean('permission_to_enter')->default(true);
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
