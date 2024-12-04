<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Pages;
use App\Settings\HomeSettingSingleton;
use App\Settings\SettingSingleton;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * show spesific page by id 
     */
    public function show(string $id)
    {   
        if(is_numeric($id)){
            $page = Pages::findOrFail($id);
        }
        else{
            $page = Pages::with('trans')->WhereTranslation('slug', $id)->get()->first();
            if($page == null) abort('404');
        }
        return view('site.pages.page', compact('page')); 
    }


    /**
     * show  contact-us
     */
    public function contactUs()
    {   
        $contactUs = HomeSettingSingleton::getInstance()->getItem('contact-us');
        
        $settings = SettingSingleton::getInstance();

        return view('site.pages.contact-us', compact('contactUs', 'settings')); 
    }
}

