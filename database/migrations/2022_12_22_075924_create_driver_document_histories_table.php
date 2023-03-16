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
        Schema::create('driver_document_histories', function (Blueprint $table) {
                 $table->bigIncrements('id');   
            $table->Integer('driver_id')->nullable();
            $table->Integer('doc_type')->nullable();
            $table->string('doc_file',150)->nullable();
            $table->date('doc_expiry')->nullable();
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
        Schema::dropIfExists('driver_document_histories');
    }
};
