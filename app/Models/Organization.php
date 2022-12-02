<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function employee(){
        return $this->hasMany('App\Models\Employee', 'organization_id', 'id');
    }


    public function country(){
        return $this->hasOne('App\Models\Country', 'id', 'country_id');
    }

    public function province(){
        return $this->hasOne('App\Models\Province', 'id', 'province_id');
    }
}
