<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Product;
use App\Settings\HomeSettingSingleton;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function index()
    {

        $selected_categories =  session::get('search_category');

        $query =  Product::with('trans')->active()->orderBy('sort', 'ASC');


        if($selected_categories) {
            $query = $query->where('category_id', $selected_categories);
        }

        $products = $query->limit(@request()->key ??6)->get();

        $categories = Categories::with('trans', 'products')->active()->orderBy('sort', 'ASC')->get();

        $productInfo = HomeSettingSingleton::getInstance()->getItem('products');

        return view('site.pages.products.index', compact('products', 'productInfo', 'categories', 'selected_categories'));
    }


    public function show($slug)
    {

        if (is_numeric($slug)) {
            $product = Product::findOrFail($slug);
        } else {
            $product = Product::with('trans')->WhereTranslation('slug', $slug)->get()->first();
            if ($product == null) abort('404');
        }

        return view('site.pages.products.show', compact('product'));
    }


    public function reset(){
        session::forget('search_category');
        return redirect()->route('site.products');
    }
}
