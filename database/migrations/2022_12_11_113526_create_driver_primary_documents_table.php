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
        Schema::create('driver_primary_documents', function (Blueprint $table) {

            $table->bigIncrements('id');   
            $table->string('driver_id',20)->nullable();
            $table->Integer('franchise')->nullable();

            $table->string('license_frontfile', 100)->nullable();
            $table->string('license_number', 100)->nullable();
            $table->date('license_expiry')->nullable();
            $table->Integer('licensefront_approval_status')->nullable()->default(0);
            $table->Integer('licensefront_upload_status')->nullable()->default(0);
            $table->string('licensefront_rejection_reason', 100)->nullable();

            $table->string('license_backfile', 100)->nullable();
            $table->Integer('licenseback_approval_status')->nullable()->default(0);
            $table->Integer('licenseback_upload_status')->nullable()->default(0);
            $table->string('licenseback_rejection_reason', 100)->nullable();

            $table->string('rc_file', 100)->nullable();
            $table->string('rc_number', 100)->nullable();
            $table->date('rc_expiry')->nullable();
            $table->Integer('rc_approval_status')->nullable()->default(0);
            $table->Integer('rc_upload_status')->nullable()->default(0);
            $table->string('rc_rejection_reason', 100)->nullable();

            $table->string('insurance_file', 100)->nullable();
            $table->date('insurance_expiry')->nullable();
            $table->Integer('insurance_approval_status')->nullable()->default(0);
            $table->Integer('insurance_upload_status')->nullable()->default(0);
            $table->string('insurance_rejection_reason', 100)->nullable();
          
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
        Schema::dropIfExists('driver_primary_documents');
    }
};
