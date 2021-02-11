<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;
    protected $table="customers";
    protected $fillable=["first_name","last_name","middle_name","delivery_address","age","phone_no"];
}
