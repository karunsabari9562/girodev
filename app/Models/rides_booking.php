<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rides_booking extends Model
{
    use HasFactory;
    protected $table='rides_bookings';
    protected $guarded=[];

  protected $dates = [
    'started_at',
    'completed_at',
     'booked_at',
     'offline_pay_franchisedt',
     'offline_pay_admindt'
    
];


     public function GetCustomer()
    {
        return $this->belongsTo(customer_registration::class, 'customer_id', 'id')->select(['id', 'name', 'mobile','device_key']);

    }

     public function GetDriver()
    {
        return $this->belongsTo(driver_registration::class, 'driver_id', 'id')->select(['id', 'name', 'mobile','driver_id']);

    }

    public function GetFranchise()
    {
        return $this->belongsTo(franchise_detail::class, 'franchise', 'id')->select(['id', 'franchise_name', 'franchise_id']);

    }
}
