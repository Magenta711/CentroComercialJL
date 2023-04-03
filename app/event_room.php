<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class event_room extends Model
{

    protected $fillable = ['name','email','telefono','date_reserva','description','state'];
}
