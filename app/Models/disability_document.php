<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class disability_document extends Model
{
    use HasFactory;
    protected $table='disability_documents';
    protected $guarded=[];
    protected $dates = [
  
    'created_at',
    
];

    public function GetCustomer()
    {
        return $this->belongsTo(customer_registration::class, 'customer_id', 'id');

    }
}
