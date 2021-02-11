<?php

namespace App\Models;
use App\Models\product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ratings extends Model
{
    use HasFactory;
    protected $table="ratings";
    protected $fillable=["stars,product_review"];
}
