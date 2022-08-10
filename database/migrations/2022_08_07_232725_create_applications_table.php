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
        Schema::create('applications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->date('date_of_birth');
            $table->string('email');
            $table->bigInteger('ssn')->nullable();
            $table->string('phone');
            $table->string('address_line_1');
            $table->string('address_line_2')->nullable();
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->integer('postal_code');
            $table->date('move_in_date');
            $table->string('job_type');
            $table->string('employer_name');
            $table->bigInteger('annual_income');
            $table->bigInteger('additional_income')->nullable();
            $table->string('employer_email')->nullable();
            $table->string('employer_phone')->nullable();
            $table->string('employer_address')->nullable();
            $table->boolean('pets')->default(false);
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
        Schema::dropIfExists('applications');
    }
};
