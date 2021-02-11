<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\product;
use Illuminate\Http\Request;

class RatingsController extends Controller
{
    //to check all the ratings
    public function index(){
        $ratings=auth()->user()->$rating;

        return response()->json([
            'success'=>true,
            'message'=>$ratings
    ]);
    }

    // to check a particular rating

    public function show ($id){
        $rating=auth()->user()->ratings()->find($id);
        if(!$rating){
            return response()->json(['success'=>false,'data'=>'product with id '.$id.'not found'],400);
        }
        return response()->json([
            'success'=>true,
            'data'=>$rating->toArray(),
        ],200);
    }

    // to add rating

    public function store(Request $request){
        $this->validate($request,[
            "stars"=>"required",
            "product_review"=>'required',
            
        ]);

        $ratings=new ratings();
        $ratings->stars=$request->stars;
        $ratings->product_review=$request->product_review;

        if(auth()->user()->category()->save($ratings)){
            return response()->json([
                'success'=>true,
                'data'=>$ratings->toArray(),
            ],200);
        }else{
            return response()->json([
                'success'=>false,
                'data'=>'product could not be found'
            ],500);
        }
    }

    //to update a rating
    public function update(Request $request,$id){
        $rating=auth()->user()->category()->find($id);

        if (!$rating){
            return response()->json([
                'success'=>false,
                'data'=>'product with id'.$id.'not found'
            ],500);
        }
        $updated=$rating->fill($request->all())->save();

        if($updated){

            return response()->json([
                'success'=>true,
                'data'=>'product updated successfully'
            ],200);
        }else{
            return response()->json([
                'success'=>false,
                'message'=>'product could not be updated succeffully'
            ],500);
        }
    }

    //to delete a rating
    public function destroy(){
        $rating=auth()->user()->category()->find($id);

        if(!$rating){
            return response()->json([
                'success'=>false,
                'message'=>'product with id'.$id.'could not be found'
            ],400);
        }
        if($rating->delete()){
            return response()->json([
                'success'=>true,
                'message'=>'product deleted'
            ],200); 
        }else{
            return response()->json([
                'success'=>false,
                'message'=>'product could not be deleted'
            ],500);
        }
    }


}
