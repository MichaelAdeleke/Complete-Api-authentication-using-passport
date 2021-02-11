<?php

namespace App\Models;
use App\Models\User;
use App\Models\category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table="products";
    protected $fillable= ['name','price'];
    use HasFactory;

  
}
