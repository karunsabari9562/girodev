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
        Schema::create('active_drivers', function (Blueprint $table) {
              $table->bigIncrements('id');   
            $table->Integer('dr_id')->nullable();
            $table->Integer('dr_code')->nullable();
            $table->string('driver_id',50)->nullable();
            $table->Integer('vehicle_category')->nullable();
            $table->Integer('vehicle_type')->nullable();
            $table->Integer('vehicle_model')->nullable();
            $table->Integer('franchise')->nullable();
            $table->Integer('availability_status')->nullable()->default(0);
            $table->Integer('status')->nullable();
            $table->Integer('ride_status')->nullable()->default(0);
            $table->timestamp('offlined_at')->nullable();
            $table->string('latitude',200)->nullable();
            $table->string('longitude',200)->nullable();
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
        Schema::dropIfExists('active_drivers');
    }
};
