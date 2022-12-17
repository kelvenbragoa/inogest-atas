<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $guarded=[];


    public function manager(){
        return $this->hasOne('App\Models\Employee', 'id', 'user_id');
    }

    public function employee(){
        return $this->hasMany('App\Models\Employee', 'department_id', 'id');
    }

    public function meeting(){
        return $this->hasMany('App\Models\Meeting', 'department_id', 'id');
    }

    public function task_done(){
        return $this->hasMany('App\Models\MeetingTask', 'department_id', 'id')->where('status',1);
    }

    public function task_not_done(){
        return $this->hasMany('App\Models\MeetingTask', 'department_id', 'id')->where('status',0);
    }

    public function meeting_tasks(){
        return $this->hasMany('App\Models\MeetingTask','department_id','id');
    }
}
