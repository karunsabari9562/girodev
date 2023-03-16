<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class district extends Model
{
    use HasFactory;

    protected $table='districts';

    protected $guarded=[];
        protected $hidden=['status'];

    public function getDistStateAttribute()
    {
        $stat=state::where('id',$this->state_id)->first();
        return $stat->state;
    }


    
}
