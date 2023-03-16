<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class driver_renewal_history extends Model
{
    use HasFactory;

     protected $dates = [
  
    'payment_date',
    'valid_from',
    'valid_to',

];

    protected $table='driver_renewal_histories';
    protected $guarded=[];
}
