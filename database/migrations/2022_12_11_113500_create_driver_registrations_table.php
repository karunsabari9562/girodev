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
        Schema::create('driver_registrations', function (Blueprint $table) {

            $table->bigIncrements('id');   
            $table->string('driver_id',20)->nullable();

            $table->string('name', 100)->nullable();
            $table->string('mobile', 100)->nullable();
            $table->string('password', 100)->nullable();

            $table->string('franchise', 100)->nullable();
            $table->string('device_key', 1000)->nullable();

            $table->string('photo',100)->nullable();
            $table->string('blood_group', 100)->nullable();
            $table->string('house_name', 100)->nullable();
            $table->string('location', 100)->nullable();
            $table->string('district', 100)->nullable();
            $table->string('state', 100)->nullable();
            $table->string('pin', 100)->nullable();
            $table->Integer('profile_upload_status')->nullable()->default(0);
            $table->Integer('profile_approval_status')->nullable()->default(0);
            $table->string('profile_reject_reason',200)->nullable()->default(0);

            $table->Integer('vehicle_category')->nullable()->default(0);
            $table->Integer('vehicle_type')->nullable()->default(0);
            $table->Integer('vehicle_model')->nullable()->default(0);
            $table->Integer('vehicle_upload_status')->nullable()->default(0);
            $table->Integer('vehicle_approval_status')->nullable()->default(0);
            $table->string('vehicle_reject_reason',200)->nullable()->default(0);
         
            $table->Integer('status')->nullable()->default(0);
            $table->string('account_reject_reason',300)->nullable();
            $table->date('account_rejected_date',200)->nullable();
       
            $table->string('login_otp',10)->nullable()->default('');
            $table->timestamp('otp_expiry')->nullable();
            $table->Integer('profile_submission')->nullable()->default(0);

             $table->Integer('admin_approval_status')->nullable()->default(0);
            $table->string('admin_reject_reason',300)->nullable();
            $table->date('admin_rejected_date')->nullable();

             $table->date('valid_from')->nullable();
              $table->date('valid_to')->nullable();


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
        Schema::dropIfExists('driver_profiles');
    }
};
