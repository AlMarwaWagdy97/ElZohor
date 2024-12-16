<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Mail\NotficationsMail;
use App\Models\Blog;
use App\Models\Career;
use App\Models\News;
use App\Models\Pages;
use App\Models\SettingsValues;
use App\Models\Teams;
use App\Settings\HomeSettingSingleton;
use App\Settings\SettingSingleton;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    /**
     * show spesific page by id
     */
    public function show(string $id)
    {
        if (is_numeric($id)) {
            $page = Pages::findOrFail($id);
        } else {
            $page = Pages::with('trans')->WhereTranslation('slug', $id)->get()->first();
            if ($page == null) abort('404');
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

    /**
     * show  about-us
     */
    public function aboutUs()
    {
        $aboutUs = Pages::findOrFail(1);

        $activeTeams = Teams::with('trans')->active()->orderBy('sort', 'ASC')->get();

        $directors = $activeTeams->where('is_directors', 1);

        $teams = $activeTeams->where('is_directors', 0);

        $settings = SettingSingleton::getInstance();

        return view('site.pages.about-us', compact('aboutUs', 'settings', 'teams', 'directors'));
    }

    /**
     * show  award
     */
    public function awards()
    {
        $awards = HomeSettingSingleton::getInstance()->getItem('awards');

        $settings = SettingSingleton::getInstance();

        return view('site.pages.awards', compact('awards', 'settings'));
    }


    public function careers()
    {
        $page = Pages::findOrFail(4);
        $careers = Career::with('category')->orderBy('sort' , 'ASC')->active()->get();
        $settings = SettingSingleton::getInstance();
        return view('site.pages.careers.index', compact('careers', 'settings' , 'page'));
    }


    public function news()
    {
        $page = Pages::findOrFail(5);
        $news = News::with('transNow')->active()->get();
        $settings = SettingSingleton::getInstance();
        return view('site.pages.news.index', compact('news', 'settings' , 'page'));
    }



    public function blogs()
    {
        $page = Pages::findOrFail(6);
        $blogs = Blog::with('transNow' )->active()->get();
        $settings = SettingSingleton::getInstance();
        return view('site.pages.blogs.index', compact('blogs', 'settings' , 'page'));
    }


    public function applyForJob($career_id)
    {
        $contactUs = HomeSettingSingleton::getInstance()->getItem('job_application');

        $settings = SettingSingleton::getInstance();

        return view('site.job_application', compact('contactUs', 'settings' , 'career_id'));
    }




}
