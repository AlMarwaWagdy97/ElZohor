<?php

namespace App\Http\Livewire\Site;

use Livewire\Component;
use App\Models\Categories;
use App\Models\Product;

class Products extends Component
{

    public $products, $categories; 
    public $selectedCategories; 

    public function mount()
    {

        $this->categories = Categories::with('trans')->orderBy('sort', 'ASC')->active()->get('id');

        $this->products = Product::with('trans')->orderBy('sort', 'ASC')->active()->limit(3)->get();

        // $this->products = Product::with( ['trans' => function ($query) { $query->where('locale', app()->getLocale());}
        //     , 'category', 'category.trans' => function ($query) { $query->where('locale', app()->getLocale());}])
        //     ->orderBy('sort', 'ASC')->active()->limit(6)->get();



    }

    public function updateCategory($id){
        // dd($id);
        $this->selectedCategories = $id;

        $this->products = Product::with('trans')->where('category_id', $id)->orderBy('sort', 'ASC')->active()->limit(3)->get();

        // $this->products = Product::with( ['trans' => function ($query) { $query->where('locale', app()->getLocale());}
        //     , 'category', 'category.trans' => function ($query) { $query->where('locale', app()->getLocale());}])
        //     ->orderBy('sort', 'ASC')->active()->limit(6)->get();
    }


    public function render()
    {
        return view('livewire.site.products');
    }
}
