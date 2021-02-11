<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\product;


class ProductController extends Controller
{
    //to check all product

    public function index(){
        $products=auth()->user()->products;

        return response()->json(['success'=>true,'data'=>$products],200);
    }

    //to check a particular product
    public function show($id){
        $product=auth()->user()->products()->find($id);

        if(!$product){
            return response()->json(['success'=>false,'data'=>'product with id '.$id.'not found'],400);
        }

        return response()->json([
            'success'=>true,
            'data'=>$product->toArray(),
        ],200);
    }

    //to store a new productt
    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'price'=>'required'

        ]);

        $product=new product();
        $product->name=$request->name;
        $product->price=$request->price;

        if(auth()->user()->products()->save($product)){
            return response()->json([
                'success'=>true,
                'data'=>$product->toArray(),
            ],200);
        }else{
            return response()->json([
                'success'=>false,
                'data'=>'product could not be found'
            ],500);
        }
    }
   
     //update our product
    public function update(Request $reques, $id){
    $product=auth()->user()->products()->find($id);
    if (!$product){
        return response()->json([
            'success'=>false,
            'data'=>'product with id'.$id.'not found'
        ],500);
    }
    $updated=$product->fill($request->all())->save();

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

    public function destroy($id){
        $product=auth()->user()->products()->find($id);

        if(!$product){
            return response()->json([
                'success'=>false,
                'message'=>'product with id'.$id.'could not be found'
            ],400);
        }

        if($product->delete()){
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
