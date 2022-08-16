<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BookingRide extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_ride', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->integer('driver_id');
            $table->integer('customer_epass_id');
            $table->date('ride_booking_date');
            $table->string('ride_booking_time');
            $table->integer('pickup_area_id');
            $table->integer('drop_off_area_id');
            $table->integer('added_persons');
            $table->integer('ride_total_person');
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
        Schema::dropIfExists('booking_ride');
    }
}
