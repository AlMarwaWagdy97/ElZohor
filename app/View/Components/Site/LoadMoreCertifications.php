<?php

namespace App\View\Components\Site;

use App\Models\Gallery;
use Illuminate\View\Component;

class LoadMoreCertifications extends Component
{
    public $certifications;
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

        $this->certifications = Gallery::with('trans')->orderBy('sort', 'ASC')
        ->active()->offset($start)->limit($count)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.site.load-more-certifications');
    }
}
