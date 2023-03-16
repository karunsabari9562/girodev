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
        Schema::create('driver_reactivate_requests', function (Blueprint $table) {
            $table->bigIncrements('id'); 
           $table->Integer('driver_id')->nullable();
            $table->date('requested_date')->nullable();
           $table->Integer('status')->nullable()->default(0);
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
        Schema::dropIfExists('driver_reactivate_requests');
    }
};
