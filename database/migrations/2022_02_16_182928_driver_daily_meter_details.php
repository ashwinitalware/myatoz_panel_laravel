<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DriverDailyMeterDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('driver_daily_meter_details', function (Blueprint $table) {
            $table->id();
            $table->integer('driver_id');
            $table->date('login_day_date');
            $table->integer('meter_reading_login');
            $table->string('meter_photo_login');
            $table->date('logout_day_date');
            $table->integer('meter_reading_logout');
            $table->string('meter_photo_logout');
            $table->float('total_amount');
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
        Schema::dropIfExists('driver_daily_meter_details');
        
    }
}
