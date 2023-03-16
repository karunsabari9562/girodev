<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class active_driver extends Model
{
    use HasFactory;


    protected $table='active_drivers';
    protected $guarded=[];
     protected $hidden=['id','dr_code','vehicle_category','vehicle_model','franchise','availability_status','status','created_at','updated_at','offlined_at','ride_status','latitude','longitude'];

      protected $dates = [
  
    'offlined_at',
  
];

public function GetDriver()
    {
        return $this->belongsTo(driver_registration::class, 'dr_id', 'id')->select('id','name','mobile','driver_id','status');
    }
}
