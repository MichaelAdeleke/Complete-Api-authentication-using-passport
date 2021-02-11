<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;


class PassportController extends Controller
{
    //

    public function register(Request $request){
        $this->validate($request,[
            'name'=>'required|min:3',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6',
 
        ]);

        //creating the user register section
        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password)
        ]);
        //creating the token for them
        $token=$user->createToken('EnlightureAcademy')->accessToken;

        return response()->json(['token'=>$token],200);
    }

    public function login(Request $request){
        $credentials=[
            'email'=>$request->email,
            'password'=>$request->password,
        ];

        if (auth()->attempt($credentials)){
            $token=auth()->user()->createToken('EnlightureAcademy')->accessToken;

            return response()->json(['token'=>$token],200);
        }else{
            return response()->json(['error'=>'Unauthorized'],401);
        }
    }

    public function details(){
        return response()->json(['user'=>auth()->user()],200);
    }
}
