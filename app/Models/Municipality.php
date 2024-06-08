<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Municipality extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function district()
    {
        return $this->belongsTo(District::class,'district_id','district_code');
    }

    public function municipalityType() 
    {
        return $this->belongsTo(MunicipalityType::class);
    }

    public function scopeSearch(Builder $query, $search)
    {
        $query->where('municipality_name_eng', 'like', "%{$search}%")->get();
    }
}
