<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    protected $fillable = ['user_id','local_id','brand','description','avatar','page'];

    public function files()
    {
        return $this->morphMany(file::class, 'fileble');
    }
}