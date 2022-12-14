<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function department(){
        return $this->hasOne('App\Models\Department', 'id', 'department_id');
    }

    public function meeting_participant(){
        return $this->hasMany('App\Models\MeetingParticipant', 'employee_id', 'id');
    }

    public function meeting_tasks(){
        return $this->hasMany('App\Models\MeetingTask','employee_id','id');
    }

    public function task_done(){
        return $this->hasMany('App\Models\MeetingTask', 'employee_id', 'id')->where('status',1);
    }

    public function task_not_done(){
        return $this->hasMany('App\Models\MeetingTask', 'employee_id', 'id')->where('status',0);
    }

  
}
