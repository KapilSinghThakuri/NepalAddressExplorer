<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function municipalities()
    {
        return $this->hasMany(Municipality::class,'district_id','district_code');
    }
    
    public function province()
    {
        return $this->belongsTo(Province::class,'province_id','id');
    }
}
