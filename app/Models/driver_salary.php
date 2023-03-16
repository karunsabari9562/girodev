<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class driver_salary extends Model
{
    use HasFactory;
       protected $table='driver_salaries';
    protected $guarded=[];

     protected $dates = [
    'payment_date','ride_from',
   
];


    public function GetDriver()
    {
        return $this->belongsTo(driver_registration::class, 'driver_id', 'id')->select(['id', 'name', 'mobile','driver_id']);

    }
    public function GetFranchise()
    {
        return $this->belongsTo(franchise_detail::class, 'franchise', 'id')->select(['id', 'franchise_name', 'franchise_id']);

    }
}
