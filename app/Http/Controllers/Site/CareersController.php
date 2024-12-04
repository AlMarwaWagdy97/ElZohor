<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Career;
use App\Settings\SettingSingleton;
use Illuminate\Http\Request;

class CareersController extends Controller
{
    public function index()
    {
        $careers = Career::with('category')->active()->get();
        $settings = SettingSingleton::getInstance();
        return view('site.pages.careers.index', compact('careers', 'settings'));
    }


    public function show($slug)
    {

        if(is_numeric($slug)){
            $career = Career::findOrFail($slug);
        }
        else{
            $career = Career::with('trans')->WhereTranslation('slug', $slug)->get()->first();
            if($career == null) abort('404');
        }

        return view('site.pages.careers.show',compact('career'));
    }
}
