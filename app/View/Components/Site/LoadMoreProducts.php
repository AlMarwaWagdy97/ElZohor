<?php

namespace App\View\Components\Site;

use App\Models\Product;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Session;

class LoadMoreProducts extends Component
{

    public $products;
    public $start = 0, $count = 6, $category_id = 0;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($category_id, $start = 0, $count = 6)
    {
        $this->start = $start;
        $this->count = $count;
        $this->category_id = $category_id;

        $query = Product::with('trans')->orderBy('sort', 'ASC')->active();

        // Check if category ID is provided in the request
        if (request()->has('category_id')) {
            $category_id = request()->input('category_id');
            $query->where('category_id', $category_id); // Apply category ID filter
        }

         // Check if category ID is provided in the session
         if (session::get('search_category')) {
            $query->where('category_id', session::get('search_category')); // Apply category ID filter
        }

        // Check if search term is provided in the request
        if (request()->has('search')) {
            $searchTerm = request()->input('search');

            // Apply search term filter
            $query->where(function ($query) use ($searchTerm) {
                $query->whereTranslationLike('name', '%' . $searchTerm . '%');
                // Add additional conditions if necessary
            });
        }

       


        $this->products = $query->offset($start)->limit($count)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.site.load-more-products');
    }
}
