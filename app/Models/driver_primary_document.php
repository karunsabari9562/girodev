<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class driver_primary_document extends Model
{
    use HasFactory;

    protected $table='driver_primary_documents';
    protected $guarded=[];

     protected $dates = [
  
    'rc_expiry',
    'license_expiry',
    'insurance_expiry',
];

    public function GetDriver()
    {
        return $this->belongsTo(driver_registration::class, 'driver_id', 'id')->select('id','name','mobile','driver_id','status');
    }

    public function GetFranchise()
    {
        return $this->belongsTo(franchise_detail::class, 'franchise', 'id')->select(['id', 'franchise_name', 'franchise_id']);

    }
}
