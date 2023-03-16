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
        Schema::create('disability_documents', function (Blueprint $table) {
           $table->bigIncrements('id'); 
           $table->Integer('customer_id')->nullable();
           $table->string('document', 100)->nullable();
           $table->Integer('document_upload_status')->nullable()->default(0);
           $table->Integer('document_approval_status')->nullable()->default(0);
           $table->string('document_rejection_reason', 300)->nullable();
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
        Schema::dropIfExists('disability_documents');
    }
};
