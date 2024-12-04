<?php

namespace App\Http\View\Composers;

use App\Models\Client;
use App\Models\HomeSettingPage;
use App\Models\Menue;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Teams;
use Illuminate\View\View;

class HomeComposer
{
    public function compose(View $view)
    {
        $sliders = Slider::with('translations')->active()->orderBy('sort', 'ASC')->get();
        $leaders = Teams::with('translations')->feature()->active()->orderBy('sort')->get();
        $products  = Product::with('translations', 'category')->feature()->active()->orderBy('sort')->get();
        $partners  = Client::with('translations')->feature()->active()->orderBy('sort')->get();
        $visions = HomeSettingPage::with('translations')->active()->whereIn('id', [5, 6, 7])->get();
        $MenuNavbar = Menue::with('translations')->main()->active()->orderBy('sort')->get();
        $view->with([
            'sliders' => $sliders,
            'leaders' => $leaders,
            'products' => $products,
            'partners' => $partners,
            'visions' => $visions,
            'MenuNavbar' => $MenuNavbar,
        ]);
    }
}
