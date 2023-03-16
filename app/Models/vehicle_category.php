<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vehicle_category extends Model
{
    use HasFactory;
    protected $table='vehicle_categories';
    protected $guarded=[];
      protected $hidden=['status','created_at','updated_at'];
}
