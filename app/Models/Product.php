<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['local_id','name','avatar','price','description','status'];

    public function items()
    {
        return $this->hasMany(ProductDetail::class,'product_id','id');
    }
    public function files()
    {
        return $this->morphMany(File::class, 'fileble');
    }
}
