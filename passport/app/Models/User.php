<?php

namespace App\Models;
use App\Models\product;
use App\Models\category;
use App\Models\ratings;
use App\Models\customer;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory,HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    public function products (){
       return  $this->hasMany(product::class);
    }

    public function category(){
        return $this->hasMany(product::class,'product_id');
    }
    public function ratings(){
        return $this->hasMany(product::class,'product_id');
    }

    public function customer(){
        return $this->hasMany(User::class,'user_id');
    }
    
 

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
