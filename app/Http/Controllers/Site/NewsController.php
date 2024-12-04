<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Settings\SettingSingleton;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::active()->get();
        $settings = SettingSingleton::getInstance();
        return view('site.pages.news.index', compact('news', 'settings'));
    }


    public function show($slug)
    {
        if(is_numeric($slug)){
            $new = News::findOrFail($slug);
        }
        else{
            $new = News::with('trans')->WhereTranslation('slug', $slug)->get()->first();
            if($new == null) abort('404');
        }

        return view('site.pages.news.show',compact('new'));
    }
}
