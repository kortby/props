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
        Schema::create('leasings', function (Blueprint $table) {
            $table->id();
            $table->string('lease_number');
            $table->date('entered_on');
            // $table->unsignedBigInteger('user_id');
            // $table->unsignedBigInteger('property_id');
            $table->string('leasing_term')->default('monthly');
            $table->date('commencement_date');
            $table->date('experation_date');
            $table->date('termination_period');
            $table->integer('rent_amount');
            $table->date('first_due_date')->nullable();
            $table->string('frequency')->nullable();
            $table->date('next_due_date')->nullable();
            $table->string('late_fees')->nullable();
            $table->integer('security_deposit')->default(0);
            $table->date('deposit_date')->nullable();
            $table->integer('extra_monthly_charges')->default(0);
            $table->integer('water_charges')->default(0);
            $table->integer('utility_admin_charges')->default(0);
            $table->integer('trash_charges')->default(0);
            $table->integer('trash_door_charges')->default(0);
            $table->string('status')->default('new');
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
        Schema::dropIfExists('leasings');
    }
};
