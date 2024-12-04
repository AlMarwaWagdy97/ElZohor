<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Settings\HomeSettingSingleton;

class CertificationController extends Controller
{
    public function index()
    {
        $certifications = Gallery::query()->with('trans')->active()->orderBy('sort', 'ASC')->limit(4)->get();

        $certificationInfo = HomeSettingSingleton::getInstance()->getItem('videos');

        return view('site.pages.certifications.index',compact('certifications', 'certificationInfo'));
    }


    public function show($slug)
    {

        if(is_numeric($slug)){
            $certification = Gallery::findOrFail($slug);
        }
        else{
            $certification = Gallery::with('trans')->WhereTranslation('slug', $slug)->get()->first();
            if($certification == null) abort('404');
        }

        return view('site.pages.certifications.show',compact('certification'));
    }


}
