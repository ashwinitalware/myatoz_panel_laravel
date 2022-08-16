<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDriver extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void

     */
    public function up()
    {
        Schema::create('add_driver', function (Blueprint $table) {
            $table->id();
            $table->integer('city_id');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('auto_no');
            $table->date('auto_insurance_validity_expire_date');
            $table->string('user_id');
            $table->string('password');
            $table->string('address');
            $table->integer('contact_no');
            $table->string('account_holder_name');
            $table->integer('account_number');
            $table->string('ifsc_code');
            $table->string('bank_name');
            $table->string('nominee_details');
            $table->string('driver_photo_name');
            $table->string('driver_aadhar_photo_name');
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
        Schema::dropIfExists('add_driver');
    }
}
