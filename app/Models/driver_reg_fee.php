<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class driver_reg_fee extends Model
{
    use HasFactory;

    protected $table='driver_reg_fees';
    protected $guarded=[];

     protected $dates = [
    'created_at',
    'updated_at',
    'timefrom',
    'timeto',
   
];
}
