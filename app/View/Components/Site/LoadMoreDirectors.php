<?php

namespace App\View\Components\Site;

use Illuminate\View\Component;
use App\Models\Teams;


class LoadMoreDirectors extends Component
{
    public $teams;
    public $start = 0, $count = 4;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($start = 0, $count = 6)
    {
        
        $this->start = $start;
        $this->count = $count;

        $this->teams = Teams::with(['trans' => function($q){
            $q->where('locale', app()->getLocale());
        }])->orderBy('sort', 'ASC')
        ->where('is_directors', 1)
        ->active()->offset($start)->limit($count)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.site.load-more-directors');
    }
}
