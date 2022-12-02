<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeetingParticipant extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function meeting(){
        return $this->hasOne('App\Models\Meeting', 'id', 'meeting_id');
    }

   
}
