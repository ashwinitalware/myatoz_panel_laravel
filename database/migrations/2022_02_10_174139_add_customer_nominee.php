<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCustomerNominee extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_customer_nominee', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->integer('subscription_id');
            $table->integer('e_pass_id');
            $table->string('name');
            $table->string('address');
            $table->integer('mobile_number');
            $table->string('relation_with_customer');
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
        Schema::dropIfExists('add_customer_nominee');
    }
}
