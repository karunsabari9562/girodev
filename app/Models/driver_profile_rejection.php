<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class driver_profile_rejection extends Model
{
    use HasFactory;
     protected $table='driver_profile_rejections';
    protected $guarded=[];

     protected $dates = [
  
    'rejected_date',
   
];
}
