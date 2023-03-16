<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class franchise_detail extends Authenticatable
{
    use HasFactory;
    protected $table='franchise_details';
    protected $guarded=[];

    protected $hidden=['fid','franchise_id','remember_token','proprietor_name','franchise_mobile','franchise_location','franchise_state','franchise_district','photo','Landline','mail_id','password','valid_from','valid_to','status','reason','blocked_date','created_at','updated_at'];

    public function GetDist()
    {
        return $this->belongsTo(district::class, 'franchise_district', 'id');
    }
}
