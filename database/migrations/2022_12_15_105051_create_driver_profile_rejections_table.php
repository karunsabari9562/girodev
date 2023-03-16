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
        Schema::create('driver_profile_rejections', function (Blueprint $table) {
             $table->bigIncrements('id');   
            $table->Integer('driver_id')->nullable();
            $table->Integer('Profile_type')->nullable();
            $table->Integer('rejected_by')->nullable();
             $table->string('rejection_reason', 3000)->nullable();
            $table->date('rejected_date')->nullable();
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
        Schema::dropIfExists('driver_profile_rejections');
    }
};
