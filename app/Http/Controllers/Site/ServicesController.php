<?php

namespace App\Http\Controllers\Site;

use App\Models\Services;
use App\Http\Controllers\Controller;
use App\Settings\HomeSettingSingleton;

class ServicesController extends Controller
{
   
    public function index()
    {
        $services = Services::query()->with('trans')->active()->orderBy('sort', 'ASC')->limit(4)->get();

        $servicesInfo = HomeSettingSingleton::getInstance()->getItem('services');

        return view('site.pages.services.index',compact('services', 'servicesInfo'));
    }


    public function show($slug)
    {

        if(is_numeric($slug)){
            $service = Services::findOrFail($slug);
        }
        else{
            $service = Services::with('trans')->WhereTranslation('slug', $slug)->get()->first();
            if($service == null) abort('404');
        }

        return view('site.pages.services.show',compact('service'));
    }

}
