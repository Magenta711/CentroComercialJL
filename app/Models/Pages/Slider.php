<?php

namespace App\Models\Pages;

use App\Models\file;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = ['title','text','startdate','enddate'];

    public function file()
    {
        return $this->morphOne(file::class, 'fileble');
    }
}
