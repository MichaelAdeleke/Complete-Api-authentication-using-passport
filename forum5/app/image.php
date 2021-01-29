<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    //
    protected $table='images';
    protected $guarded=[];
    protected $fillable=['id','Avatar','created_at','updated_at'];
}
