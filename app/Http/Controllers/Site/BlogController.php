<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Settings\HomeSettingSingleton;
use App\Settings\SettingSingleton;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::active()->get();
        $settings = SettingSingleton::getInstance();
        return view('site.pages.blogs.index', compact('blogs', 'settings'));
    }


    public function show($slug)
    {

        if(is_numeric($slug)){
            $blog = Blog::findOrFail($slug);
        }
        else{
            $blog = Blog::with('trans')->WhereTranslation('slug', $slug)->get()->first();
            if($blog == null) abort('404');
        }

        return view('site.pages.blogs.show',compact('blog'));
    }
}
