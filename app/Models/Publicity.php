<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publicity extends Model
{
    protected $fillable = ['ubications','title','value','publish','description','avatar'];

    public function files()
    {
        return $this->morphMany(file::class, 'fileble');
    }
    public function details()
    {
        return $this->hasMany(PublicityDetail::class,'publicity_id','id');
    }
}
