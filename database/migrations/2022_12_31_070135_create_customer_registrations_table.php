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
        Schema::create('customer_registrations', function (Blueprint $table) {

             $table->bigIncrements('id'); 
             $table->string('name', 100)->nullable();
             $table->string('mobile', 100)->nullable(); 
             $table->string('reference', 100)->nullable(); 
             $table->string('device_key', 1000)->nullable(); 
             $table->string('login_otp',10)->nullable()->default('');
              $table->timestamp('otp_expiry')->nullable();
             $table->Integer('disability_status')->nullable()->default(0);
             $table->string('disability_document', 100)->nullable();
             $table->Integer('status')->nullable()->default(1);
             $table->string('block_reason', 300)->nullable();
            $table->string('photo',100)->nullable(); 

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
        Schema::dropIfExists('customer_registrations');
    }
};
