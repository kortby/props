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
            $table->bigIncrements('id');
            $table->string('lease_number');
            $table->date('entered_on');
            $table->string('leasing_term')->default('monthly');
            $table->date('commencement_date');
            $table->date('experation_date');
            $table->date('termination_period');
            $table->float('rent_amount');
            $table->date('first_due_date')->nullable();
            $table->string('frequency')->nullable();
            $table->date('next_due_date')->nullable();
            $table->string('late_fees')->nullable();
            $table->float('security_deposit')->default(0);
            $table->date('deposit_date')->nullable();
            $table->float('water_charges')->default(0);
            $table->float('trash_charges')->default(0);
            $table->string('status')->default('new');
            $table->foreignId('unit_user_id');
            $table->foreignId('user_id');
            $table->integer('service_fee_id')->nullable();
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
        Schema::dropIfExists('leasings');
    }
};
