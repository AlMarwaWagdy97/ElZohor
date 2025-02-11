<?php

namespace App\View\Components\Site;

use App\Models\News;
use Illuminate\View\Component;

class LoadMoreOffers extends Component
{
    public $offers;
    public $start = 0, $count = 4;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($start = 0, $count = 4)
    {
        
        $this->start = $start;
        $this->count = $count;

        $this->offers = News::with('trans')->orderBy('sort', 'ASC')
        ->active()->offset($start)->limit($count)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.site.load-more-offers');
    }
}
