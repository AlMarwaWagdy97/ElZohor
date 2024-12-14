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
        $news = News::with('transNow')->active()->featured()->orderBy('sort' , 'ASC')->get();
        $settings = SettingSingleton::getInstance();
        return view('site.pages.news.index', compact('news', 'settings'));
    }


    public function show($slug)
    {
        if(is_numeric($slug)){
            $new = News::with('transNow')->active()->featured()->findOrFail($slug);
        }
        else{
            $new = News::with('transNow')->WhereTranslation('slug', $slug)->active()->featured()->first();
            if($new == null) abort('404');
        }

        return view('site.pages.news.show',compact('new'));
    }
}
