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
        Schema::create('driver_renewal_histories', function (Blueprint $table) {
            $table->bigIncrements('id'); 
           $table->Integer('driver_id')->nullable();
            $table->Integer('frachise')->nullable();
           $table->date('payment_date')->nullable();
           $table->Integer('amount')->nullable()->default(0);
           $table->string('reference_id',100)->nullable();
           $table->date('valid_from')->nullable();
           $table->date('valid_to')->nullable();
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
        Schema::dropIfExists('driver_renewal_histories');
    }
};
