<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\image;
class ImageController extends Controller
{
    //

    public function store(Request $request){

        $request->all();
        if($file=$request->file('avatar')){
            $name=$file->getClientOriginalName();
            $file->move('images',$name);
            $input['Avatar']=$name;
            image::create($input);
        }
       $thread=image::all();
         return view('image',compact('thread'));
    }

    public function image(Request $request){
        return view('image');
    }
}
