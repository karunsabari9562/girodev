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
        Schema::create('ride_booking_histories', function (Blueprint $table) {
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
           $table->string('service_charge',10)->nullable();
         
           $table->Integer('night_ride')->nullable();
           $table->string('driver_percent',10)->nullable();
           $table->string('driver_fare',10)->nullable();
           $table->string('tax_percent',10)->nullable();
           $table->string('tax',10)->nullable();
           $table->string('total_fare',10)->nullable();
           $table->string('franchise_percent',10)->nullable();
           $table->string('franchise_fare',10)->nullable();
           $table->string('admin_fare',10)->nullable();
            $table->string('admin_ride_fare',10)->nullable();

           $table->string('extra_ride_fee',10)->nullable();
            $table->string('waiting_charge',10)->nullable();
           $table->Integer('payment_type')->nullable();
           $table->Integer('payment_status')->nullable();
           $table->timestamp('payment_date')->nullable();
           $table->string('paid_amount',10)->nullable();
           $table->string('reference_id',200)->nullable();
           $table->Integer('status')->nullable();
           $table->string('reason',200)->nullable();
           $table->string('star_rating',200)->nullable();
           $table->string('review',200)->nullable();
           $table->timestamp('started_at')->nullable();
           $table->timestamp('completed_at')->nullable();

           $table->Integer('offline_pay_franchise')->nullable();
           $table->date('offline_pay_franchisedt')->nullable();
           $table->Integer('offline_pay_admin')->nullable();
           $table->date('offline_pay_admindt')->nullable();
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
        Schema::dropIfExists('ride_booking_histories');
    }
};
