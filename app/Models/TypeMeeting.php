<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeMeeting extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function meeting(){
        return $this->hasMany('App\Models\Meeting', 'type_meeting_id', 'id');
    }
}
