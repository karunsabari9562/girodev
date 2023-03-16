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
        Schema::create('driver_deactivate_histories', function (Blueprint $table) {
            $table->bigIncrements('id'); 
           $table->Integer('driver_id')->nullable();
            $table->Integer('deactivated_by')->nullable();
           $table->string('reason',300)->nullable();
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
        Schema::dropIfExists('driver_deactivate_histories');
    }
};
