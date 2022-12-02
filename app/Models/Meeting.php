<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function organization(){
        return $this->hasOne('App\Models\Organization', 'id', 'organization_id');
    }

    public function participants(){
        return $this->hasMany('App\Models\MeetingParticipant', 'meeting_id', 'id')->orderby('name');
    }

    public function tasks(){
        return $this->hasMany('App\Models\MeetingTask', 'meeting_id', 'id');
    }

    public function department(){
        return $this->hasOne('App\Models\Department', 'id', 'department_id');
    }

    public function type_meeting(){
        return $this->hasOne('App\Models\TypeMeeting', 'id', 'type_meeting_id');
    }

    public function comments(){
        return $this->hasMany('App\Models\Comments', 'meeting_id', 'id')->orderby('id','desc');
    }
}
