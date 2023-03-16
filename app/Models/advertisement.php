<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class advertisement extends Model
{
    use HasFactory;


    protected $table='advertisements';
    protected $guarded=[];

     protected $hidden=['visibleto_driver','visibleto_passenger','visibleto_franchise','valid_from','valid_to','status','created_at','updated_at'];
}
