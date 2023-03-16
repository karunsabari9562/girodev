<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class driver_deactivate_history extends Model
{
    use HasFactory;
      protected $table='driver_deactivate_histories';
    protected $guarded=[];

     protected $dates = [
  
    'created_at',
    
];
}
