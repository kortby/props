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
        Schema::create('unit_furnishing', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('unit_feature_unit_id');
            $table->foreignId('furnishing_item_id');
            $table->integer('number_of_items')->default(0);
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
        Schema::dropIfExists('unit_furnishings');
    }
};
