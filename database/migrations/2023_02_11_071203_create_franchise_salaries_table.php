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
        Schema::create('franchise_salaries', function (Blueprint $table) {
          $table->bigIncrements('id'); 
            $table->Integer('franchise')->nullable();
           $table->date('ride_from')->nullable();
           $table->date('ride_to')->nullable();
           $table->string('total_service_charge',10)->nullable();
            $table->string('total_commission',10)->nullable();
           $table->string('paid_amount',10)->nullable();
           $table->timestamp('payment_date')->nullable();
           $table->date('submitted_at')->nullable();
           $table->string('reference_id',150)->nullable();
           $table->string('remarks',300)->nullable();
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
        Schema::dropIfExists('franchise_salaries');
    }
};
