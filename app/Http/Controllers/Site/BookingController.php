<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Settings\SettingSingleton;

class BookingController extends Controller
{

    public function index()
    {
        $settings = SettingSingleton::getInstance();

        return view('site.pages.booking', compact('settings'));

    }
}
