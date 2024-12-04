<?php

namespace App\View\Components\Site;

use App\Models\Product;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Session;

class LoadMoreCategories extends Component
{
    public  $category_id, $products, $totalProducts;
    public $start, $count, $search;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($category_id, $start, $count, $search, $totalProducts)
    {
        
        $this->category_id = (int) $category_id;
        $this->start = (int) $start;
        $this->totalProducts = (int) $totalProducts;
        $this->count = (int) $count;
        $this->search = $search;

        // Adjust the start value based on the route parameter
        $productQuery = Product::with('trans')
            ->where('category_id', $this->category_id)
            ->orderBy('sort', 'ASC')
            ->active();

        Session::put('search_category', $this->category_id);

        // Adjust the query to limit the number of products returned based on start and count
        $productQuery->offset($this->start)->limit($this->count);


        // Retrieve products based on the constructed query
        $this->products = $productQuery->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.site.load-more-categories', [
            'remainingProducts' => $this->totalProducts - ($this->start + $this->count),
        ]);
    }
}
