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
            $table->bigIncrements('id');
            $table->string('company_name')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('county')->nullable();
            $table->string('zip')->nullable();
            $table->string('phone')->nullable();
            $table->string('contact_firstname')->nullable();
            $table->string('contact_lastname')->nullable();
            $table->string('title')->nullable();
            $table->string('direct_phone')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('employee_count')->nullable();
            $table->string('annual_sales')->nullable();
            $table->string('sic_code')->nullable();
            $table->string('industry')->nullable();
            $table->boolean('is_client')->default(false);
            $table->boolean('user_id');
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
        Schema::dropIfExists('prospects');
    }
};
