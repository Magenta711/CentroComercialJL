<?php

namespace App;

use App\Models\EventRoomCategory;
use Illuminate\Database\Eloquent\Model;

class EventRoom extends Model
{
    protected $fillable = ['title','start','end','all_day','status'];

    public function category()
    {
        return $this->hasOne(EventRoomCategory::class,'id','category_id');
    }
}
