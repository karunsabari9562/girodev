<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vehicle_type extends Model
{
    use HasFactory;

    protected $table='vehicle_types';
    protected $guarded=[];
    

    protected $hidden=['status','created_at','updated_at','fare','timefrom','timeto','service_charge','ride_tax','div_profit','special_ride','minimum_fare','minimum_distance','sp_charge'];

      public function GetCategory()
    {
        return $this->belongsTo(vehicle_category::class, 'category', 'id');
    }

}
