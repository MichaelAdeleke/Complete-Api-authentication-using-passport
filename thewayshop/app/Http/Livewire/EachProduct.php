<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class EachProduct extends Component
{

    public $slug;

    public function mount($slug){
        $this->slug=$slug;
    }
    public function render()
    {
     $product=product::where('slug',$this->slug)->first();
        return view('livewire.each-product',['product'=>$product])->layout('layouts.base');
        
    }


}
