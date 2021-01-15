<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class channel extends Model
{
    //
    protected $guarded=[];
    public function getRouteKeyName(){
        return 'slug';
    }
   public function threads(){
       return $this->hasMany(Thread::class);
   }
}
