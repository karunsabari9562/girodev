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
        Schema::create('driver_secondary_documents', function (Blueprint $table) {

            $table->bigIncrements('id');   
            $table->string('driver_id',20)->nullable();
            $table->Integer('franchise')->nullable();

            $table->string('pollution_file', 100)->nullable();
            $table->date('pollution_expiry')->nullable();
            $table->Integer('pollution_approval_status')->nullable()->default(0);
            $table->Integer('pollution_upload_status')->nullable()->default(0);
            $table->string('pollution_rejection_reason', 100)->nullable();

            $table->string('permit_file', 100)->nullable();
            $table->date('permit_expiry')->nullable();
            $table->Integer('permit_approval_status')->nullable()->default(0);
            $table->Integer('permit_upload_status')->nullable()->default(0);
            $table->string('permit_rejection_reason', 100)->nullable();
         
            $table->Integer('payment_status')->nullable()->default(0);
            $table->date('payment_date')->nullable();
            $table->string('amount')->nullable();
            $table->string('reference_id', 100)->nullable();
            $table->Integer('payment_approval_status')->nullable()->default(0);
            $table->string('payment_rejection_reason', 100)->nullable();

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
        Schema::dropIfExists('driver_secondary_documents');
    }
};
