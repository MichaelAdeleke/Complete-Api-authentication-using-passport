<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;



class ProductController extends Controller
{
    //to check all product

    public function index(){
        $customers=auth()->user()->customers;

        return response()->json(['success'=>true,'data'=>$customers],200);
    }

    //to check a particular product
    public function show($id){
        $customer_detail=auth()->user()->products()->find($id);

        if(!$customer_detail){
            return response()->json(['success'=>false,'data'=>'customer  with id '.$id.'not found'],400);
        }

        return response()->json([
            'success'=>true,
            'data'=>$customer_detail->toArray(),
        ],200);
    }

    //to store a new productt
    public function store(Request $request){
        $this->validate($request,[
            'first_name'=>'required',
            'last_name'=>'required',
            'middle_name'=>'required',
            'delivery_address'=>'required',
            'age'=>'required',
            'phone_no'=>'required'


        ]);

        $customer=new customer();
        $customer->first_name=$request->first_name;
        $product->last_name=$request->last_name;
        $product->middle_name=$request->middle_name;
        $product->delivery_address=$request->delivery_address;
        $product->age=$request->age;
        $product->phone_no=$request->phone_no;

        if(auth()->user()->products()->save($customer)){
            return response()->json([
                'success'=>true,
                'data'=>$customer->toArray(),
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
    $customer_update=auth()->user()->products()->find($id);
    if (!$customer_update){
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
        $customer=auth()->user()->products()->find($id);

        if(!$customer){
            return response()->json([
                'success'=>false,
                'message'=>'product with id'.$id.'could not be found'
            ],400);
        }

        if($customer->delete()){
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
