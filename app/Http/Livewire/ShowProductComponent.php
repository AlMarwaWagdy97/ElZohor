<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ShowProductComponent extends Component
{
//    public $data;
    public $isOpen = "none";



    public function mount($product_id , $product_image , $product_name , $product_description)
    {

        $this->product_id = $product_id;
        $this->product_image = $product_image;
        $this->product_name = $product_name;
        $this->product_description = $product_description;

    }


    public function render()
    {
        return view('livewire.show-product-component' );
    }




    public function getData(){
//        $this->data = Product::with('transNow')->find($this->product_id);

        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = "block";
     }

    public function closeModal()
    {
        $this->isOpen = "none";
    }

    public function showOpen()
    {
        return $this->openModal();
    }

    public function showClose()
    {
        return $this->closeModal();
    }

}
