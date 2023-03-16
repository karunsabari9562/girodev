<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class unfinished_bookings extends Model
{
      use HasFactory;
    protected $table='unfinished_bookings';
    protected $guarded=[];
     protected $dates = [

     'booked_at',

    
];


    public function GetCustomer()
    {
        return $this->belongsTo(customer_registration::class, 'customer_id', 'id')->select(['id', 'name', 'mobile']);

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
