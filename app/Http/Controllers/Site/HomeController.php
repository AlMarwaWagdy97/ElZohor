<?php

namespace App\Http\Controllers\Site;

use App\Models\Pages;
use App\Services\HomeService;
use App\Models\HomeSettingPage;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function home()
    {
        $data = (new HomeService())->index();

        return view('site.pages.home', $data);
    }
}
