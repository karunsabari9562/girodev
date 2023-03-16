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
        Schema::create('fare_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('category');
            $table->bigInteger('type');
            $table->bigInteger('fare');
            $table->string('service_charge', 10)->nullable();
            $table->string('ride_tax', 10)->nullable();
            $table->string('div_profit', 10)->nullable();
             $table->string('driver_profit', 10)->nullable();
            $table->string('sp_charge', 10)->nullable();
            $table->bigInteger('special_ride')->nullable();
            $table->time('timefrom')->nullable();
            $table->time('timeto')->nullable();
            $table->string('minimum_fare', 10)->nullable();
            $table->string('minimum_distance', 10)->nullable();
            $table->string('ipaddress')->nullable();
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
        Schema::dropIfExists('fare_histories');
    }
};
