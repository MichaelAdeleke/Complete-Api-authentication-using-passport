<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\product;

class BlogComponent extends Component
{
    public function render()
    {
        $product=product::latest()->get();
        return view('livewire.blog-component',['product'=>$product])->layout('layouts.base');
    }
}
