<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class driver_reactivate_request extends Model
{
    use HasFactory;

    protected $table='driver_reactivate_requests';
    protected $guarded=[];

    protected $dates = [
    'requested_date',
    
];
}
