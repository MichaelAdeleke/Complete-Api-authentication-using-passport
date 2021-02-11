<?php

namespace App\Models;
use App\Model\product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class category extends Model
{
    use HasFactory,HasApiTokens;
    protected $table="categories";
    protected $fillable=["category","brand","price_range"];


}
