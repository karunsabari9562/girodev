<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vehicle_model extends Model
{
    use HasFactory;
    protected $table='vehicle_models';
    protected $guarded=[];
    protected $hidden=['status','created_at','updated_at'];

      public function GetCategory()
    {
        return $this->belongsTo(vehicle_category::class, 'category', 'id');
    }


      public function GetType()
    {
        return $this->belongsTo(vehicle_type::class, 'type', 'id');
    }
}
