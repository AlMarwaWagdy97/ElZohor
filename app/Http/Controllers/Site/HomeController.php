<?php

namespace App\Http\Controllers\Site;

use App\Services\HomeService;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function home()
    {
        $data = (new HomeService())->index();

        return view('site.pages.home', $data);
    }
}
