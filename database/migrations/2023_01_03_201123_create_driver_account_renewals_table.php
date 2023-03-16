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
        Schema::create('driver_account_renewals', function (Blueprint $table) {
           $table->bigIncrements('id'); 
           $table->Integer('driver_id')->nullable();
           $table->Integer('franchise')->nullable();
           $table->date('payment_date')->nullable();
           $table->Integer('amount')->nullable()->default(0);
           $table->string('reference_id',100)->nullable()->default(0);
           $table->Integer('approval_status')->nullable();
           $table->string('rejection_reason',200)->nullable();
            $table->date('rejected_date')->nullable();
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
        Schema::dropIfExists('driver_account_renewals');
    }
};
