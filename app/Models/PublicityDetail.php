<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class PublicityDetail extends Model
{
    protected $fillable = ['user_id','publicity_id','description'];
    public function publicity()
    {
        return $this->hasOne(Publicity::class,'id','publicity_id');
    }
    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
