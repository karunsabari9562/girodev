<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class driver_secondary_document extends Model
{
    use HasFactory;

     protected $table='driver_secondary_documents';
    protected $guarded=[];
    protected $dates = [
  
    'pollution_expiry',
    'permit_expiry',
    'payment_date',
    
];

    public function GetDriver()
    {
        return $this->belongsTo(driver_registration::class, 'driver_id', 'id');
    }

    public function GetFranchise()
    {
        return $this->belongsTo(franchise_detail::class, 'franchise', 'id')->select(['id', 'franchise_name', 'franchise_id']);

    }
}
