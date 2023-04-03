<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    protected $fillable = ['ubication','code','dimensions','value','type','publish','description','status'];

    public function files()
    {
        return $this->morphMany(File::class, 'fileble');
    }
    
    public function rents()
    {
        return $this->hasMany(Rent::class,'local_id','id');
    }
}