<?php

namespace App\Http\Controllers;
use App\Favorites;
use App\Reply;
use Illuminate\Http\Request;


class FavoriteController extends Controller
{
    //
      /**
     * Store a newly created resource in storage.
     *
     * @param  Reply $reply
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function store(Reply $reply){
       $reply->favorite();
       return back();

    }
    public function __construct(){
        $this->middleware('auth');
    }
}
