<?php

namespace App\Http\Livewire;
use App\Models\Product;
use Livewire\Component;
use Cart;

class DetailsComponent extends Component
{
    public $slug;

    public function mount($slug){
      
        $this->slug= $slug;
    
    }

    public function store($product_id,$product_name,$product_price)
    {
        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','item added successfully to cart');
        return redirect()->route('product.cart');

    }
    public function render()
    {
        $products=Product::where('slug',$this->slug)->first();
        $popular_product=product::inRandomOrder()->limit(3)->get();
        $related_product=product::where('category_id',$products->category_id)->inRandomOrder()->limit(5)->get();
        return view('livewire.details-component',['products'=>$products,'popular_product'=>$popular_product,'related_product'=>$related_product])->layout('layouts.base');
    }
}
