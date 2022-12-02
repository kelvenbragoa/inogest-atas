<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function type(){
        return $this->hasOne('App\Models\TypeTicket', 'id', 'type_ticket_id');
    }

    public function messages(){
        return $this->hasMany('App\Models\MessageTicket', 'ticket_id', 'id')->orderby('id','desc');
    }
}
