<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class franchise_salary extends Model
{
    use HasFactory;
    protected $table='franchise_salaries';
    protected $guarded=[];

     protected $dates = [
    'payment_date','ride_from','ride_to',
   
];

public function GetFranchise()
    {
        return $this->belongsTo(franchise_detail::class, 'franchise', 'id')->select(['id', 'franchise_name', 'franchise_id']);

    }
    
}
