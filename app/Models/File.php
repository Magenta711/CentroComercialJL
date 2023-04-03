<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = ['name','fileble_type','fileble_id','size','type','url','state'];

    public function fileble()
    {
        return $this->morphTo();
    }
}
