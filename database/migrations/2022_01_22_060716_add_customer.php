<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCustomer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_customer', function (Blueprint $table) {
            $table->id();
            $table->integer('city_id');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('user_id');
            $table->string('password');
            $table->integer('aadhar_number');
            $table->string('address');
            $table->integer('contact_no');
            $table->string('nominee_details');
            $table->string('customer_photo_name');
            $table->string('aadhar_photo_name');
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
        Schema::dropIfExists('subscription');
    }
}
