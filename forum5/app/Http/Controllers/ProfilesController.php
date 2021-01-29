<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\image;

class ProfilesController extends Controller
{
    //
    public function show(User $user){
        return view('profiles.show',[
        'profileUser'=>$user,
        'thread'=>$user->threads()->paginate(1)
        ]);

        $path=$request->file('avatar')->store('images','public');
        echo $path;
    }

  

  
}
