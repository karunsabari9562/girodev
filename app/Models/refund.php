<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class refund extends Model
{
    use HasFactory;

    protected $table='refunds';
        protected $guarded=[];

         public function GetCustomer()
    {
        return $this->belongsTo(customer_registration::class, 'customer_id', 'id')->select(['id', 'name', 'mobile']);

    }

     public function GetDriver()
    {
        return $this->belongsTo(driver_registration::class, 'driver_id', 'id')->select(['id', 'name', 'mobile','driver_id']);

    }
}
