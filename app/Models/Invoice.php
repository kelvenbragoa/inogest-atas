<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $guarded=[];


    public function organization(){
        return $this->hasOne('App\Models\Organization','id','organization_id');
    }

    public function transaction(){
        return $this->hasMany('App\Models\Transaction', 'invoice_id', 'id');
    }
}
