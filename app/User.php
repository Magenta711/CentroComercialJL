<?php

namespace App;

use App\Models\Rent;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasRoles;
    use Notifiable;


    public function my_locals()
    {
        return $this->hasMany(Rent::class,'user_id','id');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','type','status','address','tel','avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function hasProduct($id,$item)
    // {
    //     // if (in_array($id,array_column(get_object_vars($this->my_locals()),'id'))) {
    //     //     // $local = Rent::find($id);
    //     //     // if (in_array($item,array_column(get_object_vars($local->my_products()),'id'))) {
    //     //     //     return true;
    //     //     // }
    //     //     return true;
    //     // }
    //     return false;
    // }
}
