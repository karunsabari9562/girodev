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
        Schema::create('refunds', function (Blueprint $table) {

          $table->bigIncrements('id'); 
            $table->string('bid',20)->nullable(); 
           $table->Integer('customer_id')->nullable();
            $table->Integer('driver_id')->nullable();
           $table->date('booked_date')->nullable();
           $table->date('payment_date')->nullable();
           $table->string('paid_amount',10)->nullable();
           $table->string('reference_id',100)->nullable();
           $table->string('remarks',500)->nullable();
           $table->Integer('status')->nullable();
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
        Schema::dropIfExists('refunds');
    }
};
