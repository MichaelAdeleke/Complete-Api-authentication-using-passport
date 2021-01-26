<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserAvatarController extends Controller
{
    //
    public function store()
    {
      $this->validate(request(),[
          'avatar'=>['required','image']

      ]);
    }

    public function __construct(){
        $this->middleware('Auth');
    }
}
