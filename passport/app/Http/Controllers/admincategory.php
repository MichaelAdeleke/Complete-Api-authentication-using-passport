<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\product;

class admincategory extends Controller
{
    //
    //to check all category
    public function index(){
        $categories=auth()->user()->categories;

        return response()->json([
            'success'=>true,
            'message'=>$categories
    ]);
    }

    //to check a particular category
    public function show($id){
        $category=auth()->user()->category()->find($id);

        if(!$category){
            return response()->json(['success'=>false,'data'=>'category with id '.$id.'not found'],400);
        }

        return response()->json([
            'success'=>true,
            'data'=>$category->toArray(),
        ],200);
    }

    //to store a new product
    public function store(Request $request){
        $this->validate($request,[
            "category"=>"required",
            "brand"=>'required',
            "price_range"=>"required"
        ]);
        
        $category=new category();
        $category->category=$request->category;
        $category->brand=$request->brand;
        $category->price_range=$request->price_range;
        
        if(auth()->user()->category()->save($category)){
            return response()->json([
                'success'=>true,
                'data'=>$category->toArray(),
            ],200);
        }else{
            return response()->json([
                'success'=>false,
                'data'=>'category could not be found'
            ],500);
        }
      
    }
    //update our product

    public function update(Request $request,$id){
        $category=auth()->user()->category()->find($id);

        if (!$category){
            return response()->json([
                'success'=>false,
                'data'=>'category with id'.$id.'not found'
            ],500);
        }
        $updated=$product->fill($request->all())->save();

        if($updated){

            return response()->json([
                'success'=>true,
                'data'=>'category updated successfully'
            ],200);
        }else{
            return response()->json([
                'success'=>false,
                'message'=>'category could not be updated succeffully'
            ],500);
        }
    }

    //to delete a request

    public function destroy(){
        $category=auth()->user()->category()->find($id);

        if(!$category){
            return response()->json([
                'success'=>false,
                'message'=>'category with id'.$id.'could not be found'
            ],400);
        }
        if($category->delete()){
            return response()->json([
                'success'=>true,
                'message'=>'category deleted'
            ],200); 
        }else{
            return response()->json([
                'success'=>false,
                'message'=>'category could not be deleted'
            ],500);
        }
    }
}
