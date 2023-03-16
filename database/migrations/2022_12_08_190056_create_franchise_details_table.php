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
        Schema::create('franchise_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('fid')->nullable();
            $table->rememberToken();
            $table->string('franchise_id', 100)->nullable();
            $table->bigInteger('franchise_type')->nullable();
            $table->string('franchise_name', 100)->nullable();
            $table->string('proprietor_name', 100)->nullable();
            $table->string('franchise_mobile', 100)->nullable();
            $table->string('franchise_location', 100)->nullable();
            $table->string('franchise_state', 100)->nullable();
            $table->string('franchise_district', 100)->nullable();
            $table->string('photo', 100)->nullable();
            $table->string('Landline', 100)->nullable();
            $table->string('mail_id', 100)->nullable();
            $table->string('password', 100)->nullable();
            $table->date('valid_from')->nullable();
            $table->date('valid_to')->nullable();
            $table->string('reason', 500)->nullable();
            $table->date('blocked_date')->nullable();
            $table->bigInteger('status')->nullable()->default(0);
            $table->string('profit', 10)->nullable();
            $table->string('latitude', 150)->nullable();
            $table->string('longitude', 150)->nullable();
            $table->string('geo_location', 300)->nullable();
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
        Schema::dropIfExists('franchise_details');
    }
};
