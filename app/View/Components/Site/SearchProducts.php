<?php

namespace App\View\Components\Site;

use App\Models\Product;
use Clockwork\Request\Request;
use Illuminate\View\Component;

class SearchProducts extends Component
{
    public $search;
    public $start;
    public $count;
    public $category_id;
    public $products;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($search = '', $start, $count, $category_id)
    {
        $this->start = $start;
        $this->count = $count;
        $this->category_id = $category_id;

        // Check if $search is empty or if it's provided in the request
        $searchTerm = $search !== '' ? $search : request()->input('search', '');

        $this->search = $searchTerm;
        if (Request()->has('category_id') && Request()->has('search')) {
            $this->products = Product::with('trans')
                ->where('category_id', request()->input('category_id'))
                ->whereTranslationLike('name', '%' . $searchTerm . '%')
                ->orderBy('sort', 'ASC')
                ->active()
                ->offset($start)
                ->limit($count)
                ->get();
        } else {
            $this->products = Product::with('trans')
                ->whereTranslationLike('name', '%' . $searchTerm . '%')
                ->orderBy('sort', 'ASC')
                ->active()
                ->offset($start)
                ->limit($count)
                ->get();
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {

        return view('components.site.search-products');
    }
}
