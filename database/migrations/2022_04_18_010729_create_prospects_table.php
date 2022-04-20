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
        Schema::create('prospects', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('county');
            $table->string('zip');
            $table->string('phone');
            $table->string('contact_firstname');
            $table->string('contact_lastname');
            $table->string('title');
            $table->string('direct_phone');
            $table->string('email');
            $table->string('website');
            $table->string('employee_count');
            $table->string('annual_sales');
            $table->string('sic_code');
            $table->string('industry');
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
        Schema::dropIfExists('prospects');
    }
};
