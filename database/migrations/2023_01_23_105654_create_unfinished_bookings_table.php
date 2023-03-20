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
        Schema::create('unfinished_bookings', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->string('bid',200)->nullable(); 
           $table->string('booking_id',200)->nullable(); 
           $table->Integer('customer_id')->nullable();
           $table->timestamp('booked_at')->nullable();
           $table->date('booked_date')->nullable();
           $table->string('from_latitude',150)->nullable();
           $table->string('from_longitude',150)->nullable();
           $table->string('from_location',250)->nullable();
           $table->string('to_latitude',150)->nullable();
           $table->string('to_longitude',150)->nullable();
           $table->string('to_location',250)->nullable();
           $table->Integer('vehicle_type')->nullable();
           $table->Integer('driver_id')->nullable();
           $table->string('distance',100)->nullable();
           $table->string('time',50)->nullable();
            $table->string('franchise',10)->nullable();
           $table->string('fare',100)->nullable();

           $table->string('total_fare',10)->nullable();
           $table->Integer('night_ride')->nullable();
           $table->Integer('payment_type')->nullable();
           $table->Integer('payment_status')->nullable();
           $table->timestamp('payment_date')->nullable();
           $table->string('paid_amount',10)->nullable();
           $table->string('reference_id',100)->nullable();
           $table->Integer('refund_status')->nullable()->default(0);
          $table->timestamp('started_at')->nullable();


           $table->Integer('status')->nullable();
           $table->string('reason',200)->nullable();
          
          
           
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
        Schema::dropIfExists('unfinished_bookings');
    }
};
