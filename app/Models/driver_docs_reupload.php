<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class driver_docs_reupload extends Model
{
    use HasFactory;

     protected $table='driver_docs_reuploads';
    protected $guarded=[];

    public function GetDriver()
    {
        return $this->belongsTo(driver_registration::class, 'driver_id', 'id')->select('id','driver_id','name','mobile','photo');
    }

    public function GetFranchise()
    {
        return $this->belongsTo(franchise_detail::class, 'franchise', 'id');
    }

}
