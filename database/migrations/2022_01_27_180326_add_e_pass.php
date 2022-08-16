<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEPass extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_e_pass', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->integer('city_id');
            $table->date('booking_date');
            $table->integer('subscription_id');
            $table->integer('duration');
            $table->integer('monthly_insurance_taken');
            $table->date('from_date');
            $table->date('to_date');
            $table->string('e_pass_no');
            $table->float('amount_to_be_paid');
            $table->string('mode_of_payment_id');
            $table->enum('status', ['active','inactive'])->default('active');
            $table->softDeletes();
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
        Schema::dropIfExists('add_e_pass');
    }
}
