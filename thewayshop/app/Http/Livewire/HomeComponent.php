<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\product;
use Illuminate\Str;

class HomeComponent extends Component
{
   public function render()
    {
       
        $product=product::paginate(10);

        return view('livewire.home-component',['product'=>$product])->layout('layouts.base');
    }
}
