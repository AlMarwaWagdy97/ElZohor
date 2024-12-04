<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Product;

class CategoryController extends Controller
{
    public function index(){

        $categories = Categories::with('trans')->orderBy('sort', 'ASC')->active()->limit(8)->get();

        return view('site.pages.categories.index', compact('categories'));
    }
    

    public function show($slug = null){
        if(is_numeric($slug)){
            $category = Categories::findOrFail($slug);
        }
        else{
            $category = Categories::with('trans')->WhereTranslation('slug', $slug)->get()->first();
            if($category == null) abort('404');
        }

        $products = Product::with('trans')->where('category_id', $category->id)
            ->orderBy('sort', 'ASC')->active()->offset(0)->limit(2)->get();

        return view('site.pages.categories.show', compact('category', 'products')); 
    }
}