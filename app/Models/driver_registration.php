<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class driver_registration extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table='driver_registrations';
    protected $guarded=[];
    protected $dates = [
    'created_at',
    'account_rejected_date',
    'approved_date',
    'valid_from',
    'valid_to',
];


     public function GetFranchise()
    {
        return $this->belongsTo(franchise_detail::class, 'franchise', 'id')->select(['id', 'franchise_name', 'franchise_id']);

    }

     public function GetReactivate()
    {
        return $this->belongsTo(driver_reactivate_request::class, 'id', 'driver_id')->select(['id', 'requested_date','status']);

    }

     public function GetPDocs()
    {
        return $this->belongsTo(driver_primary_document::class, 'id', 'driver_id')->select(['id', 'licensefront_upload_status', 'licensefront_approval_status','licenseback_upload_status','licenseback_approval_status','rc_upload_status','rc_approval_status','insurance_upload_status','insurance_approval_status','license_frontfile','license_number','license_expiry','license_backfile','rc_file','rc_number','rc_expiry','insurance_file','insurance_expiry','licensefront_rejection_reason','licenseback_rejection_reason','rc_rejection_reason','insurance_rejection_reason']);

    }

    public function GetSDocs()
    {
        return $this->belongsTo(driver_secondary_document::class, 'id', 'driver_id')->select(['id', 'pollution_upload_status', 'pollution_approval_status','permit_upload_status','permit_approval_status','payment_status','pollution_file','pollution_expiry','permit_file','permit_expiry','payment_date','amount','reference_id','pollution_rejection_reason','permit_rejection_reason']);

    }

    public function GetDistrict()
    {
        return $this->belongsTo(district::class, 'district', 'id');
    }

    public function GetState()
    {
        return $this->belongsTo(state::class, 'state', 'id');
    }

    public function GetVcategory()
    {
        return $this->belongsTo(vehicle_category::class, 'vehicle_category', 'id');
    }

    public function GetVtype()
    {
        return $this->belongsTo(vehicle_type::class, 'vehicle_type', 'id');
    }

    public function GetVmodel()
    {
        return $this->belongsTo(vehicle_model::class, 'vehicle_model', 'id');
    }

   

}
