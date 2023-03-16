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
        Schema::create('driver_reg_fees', function (Blueprint $table) {
             $table->bigIncrements('id');   

            $table->string('fee', 100)->nullable();
            $table->Integer('status')->nullable()->default(0);
            $table->time('timefrom', 100)->nullable();
            $table->time('timeto', 100)->nullable();
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
        Schema::dropIfExists('driver_reg_fees');
    }
};
