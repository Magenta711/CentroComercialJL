<?php

namespace App\Models;

use App\SocialMediaRents;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    protected $fillable = ['user_id','local_id','brand','description','avatar','page','is_page','tel','status'];

    public function files()
    {
        return $this->morphMany(file::class, 'fileble');
    }
    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
    public function local()
    {
        return $this->hasOne(Local::class,'id','local_id');
    }
    public function social_medias()
    {
        return $this->hasMany(SocialMediaRents::class,'rent_id','id');
    }
}