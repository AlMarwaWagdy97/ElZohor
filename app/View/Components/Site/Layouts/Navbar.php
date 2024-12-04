<?php

namespace App\View\Components\Site\Layouts;

use App\Models\Menue;
use App\Settings\SettingSingleton;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;

class Navbar extends Component
{
    public $settings;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->settings = SettingSingleton::getInstance();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        // Cache::forget('menus');
        $menus = Cache::get('menus');
        if( $menus == null){
            $menus = Cache::rememberForever('menus', function () {
                return Menue::with('trans')->orderBy('sort', 'ASC')->main()->active()->get();
            });
        }
        return view('components.site.layouts.navbar', compact('menus'));
    }
}
