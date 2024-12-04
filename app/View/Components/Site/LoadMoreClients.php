<?php

namespace App\View\Components\Site;

use App\Models\Client;
use Illuminate\View\Component;

class LoadMoreClients extends Component
{
    public $clients;
    public $start = 8, $count = 8;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($start = 8, $count = 8)
    {
        
        $this->start = $start;
        $this->count = $count;
        $this->clients = Client::with('trans')->orderBy('sort', 'ASC')
        ->active()->offset($start)->limit($count)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.site.load-more-clients');
    }
}
