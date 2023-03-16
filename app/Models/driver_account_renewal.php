<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class driver_account_renewal extends Model
{
    use HasFactory;
     protected $table='driver_account_renewals';
    protected $guarded=[];

     protected $dates = [
  
    'created_at',
    'payment_date',
    'rejected_date',

];

    public function GetDriver()
    {
        return $this->belongsTo(driver_registration::class, 'driver_id', 'id')->select('id','name','mobile','driver_id','status','valid_to');
    }

    public function GetFranchise()
    {
        return $this->belongsTo(franchise_detail::class, 'franchise', 'id')->select(['id', 'franchise_name']);

    }
}
