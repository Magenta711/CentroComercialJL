<?php

namespace App\Models\Pages;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $fillable = ['name','email','tel','type','data','status'];
}
