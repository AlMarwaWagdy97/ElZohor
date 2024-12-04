<?php

use App\Http\Controllers\Site\GenerateSitemapController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Support\Facades\Blade;
use App\Http\Controllers\Site\CertificationController;
use App\Http\Controllers\Site\ClientController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\PageController;
use App\Http\Controllers\Site\ProductController;
use App\Http\Controllers\Site\TeamsController;
use App\Http\Controllers\Site\VideosController;
use App\View\Components\Site\LoadMoreCategories;
use App\View\Components\Site\LoadMoreCertifications;
use App\View\Components\Site\LoadMoreClients;
use App\View\Components\Site\LoadMoreDirectors;
use App\View\Components\Site\LoadMoreProducts;
use App\View\Components\Site\LoadMoreTeams;
use App\View\Components\Site\LoadMoreVideos;
use App\View\Components\Site\SearchProducts;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localize', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath'], // Route translate middleware
    'as' => 'site.'
], function () {


    /************************************start generate site map *******************************/





    Route::controller(GenerateSitemapController::class)->group(function () {
        route::get('all-generate-sitemap', 'generate')->name('sitemap');
//        route::get('generate-sitemap', 'home')->name('home-sitemap');

        route::get('about-us/generate-sitemap', 'about')->name('about-sitemap');
        route::get('contact-us/generate-sitemap', 'contactUs')->name('contact-sitemap');
        route::get('clients/generate-sitemap', 'clients')->name('clients-sitemap');





        route::get('pages/{slug}/generate-sitemap', 'pages')->name('pages-sitemap');
//

//        route::get('media/generate-sitemap', 'media')->name('media-sitemap');
//        route::get('media/{slug}/generate-sitemap', 'singleMedia')->name('single-media-sitemap');



        route::get('products/generate-sitemap', 'products')->name('products-sitemap');
        route::get('products/{slug}/generate-sitemap', 'singleProduct')->name('single-products-sitemap');



        route::get('certifications/generate-sitemap', 'certifications')->name('certifications-sitemap');
        route::get('certifications/{slug}/generate-sitemap', 'singleCertificate')->name('single-certifications-sitemap');



        route::get('videos/generate-sitemap', 'videos')->name('videos-sitemap');
        route::get('videos/{slug}/generate-sitemap', 'singleVideo')->name('single-videos-sitemap');


        route::get('teams/generate-sitemap', 'teams')->name('teams-sitemap');
        route::get('teams/{slug}/generate-sitemap', 'singleTeam')->name('single-teams-sitemap');


    });




    /**********************end generate site map****************************************/



    Route::controller(HomeController::class)->group(function () {
        Route::get('/', 'home')->name('home');
    });

    Route::controller(ProductController::class)->group(function () {
        Route::get('products', 'index')->name('products');
        Route::get('products/{slug}', 'show')->name('products.show');
        Route::get('products-reset', 'reset')->name('products-reset');

    });

    Route::controller(PageController::class)->group(function () {
        Route::get('pages/{slug}', 'show')->name('pages');
        Route::get('about-us', 'aboutUs')->name('about-us');
        Route::get('contact-us', 'contactUs')->name('contact-us');
    });

    Route::controller(CertificationController::class)->group(function () {
        Route::get('certifications', 'index')->name('certifications');
        Route::get('certifications/{slug}', 'show')->name('certifications.show');
    });

    Route::controller(VideosController::class)->group(function () {
        Route::get('videos', 'index')->name('videos');
        Route::get('videos/{slug}', 'show')->name('videos.show');
    });

    Route::controller(ClientController::class)->group(function () {
        Route::get('clients', 'index')->name('clients');
    });

    Route::controller(TeamsController::class)->group(function () {
        Route::get('teams', 'index')->name('teams');
        Route::get('teams/{slug}', 'show')->name('teams.show');
    });


    Route::match(['get', 'post'], 'search-products', function () {
        $search = request('search', '');
        $category_id = request('category_id', 0); // defaulting to 0 if not provided
        $start = (int) request('start', 0); // defaulting to 0 if not provided
        $count = (int) request('count', 6); // defaulting to 6 if not provided
        $component = new SearchProducts($search, $start, $count, $category_id);
        return Blade::renderComponent($component);
    })->name('searchProducts');


    Route::get('categories-more/{category_id}/{start}/{count}/{totalProducts}', function ($category_id, $start, $count ,$totalProducts) {
        $count = 6; // Define the count value here
        $search = $search = request('search', ''); // Define the search value here
        return Blade::renderComponent(new LoadMoreCategories($category_id, $start, $count, $search, $totalProducts));
    })->name('categories.loadMore');
    Route::get('products-more/{category_id}/{start}/{count}', fn ($category_id, $start, $count) => Blade::renderComponent(new LoadMoreProducts($category_id, $start, $count)))->name('products-more.loadMore');







    /****************************new******************************/
    Route::view('test_now' , 'site/test');
















    Route::get('teams-more/{start}/{count}', fn ($start, $count) => Blade::renderComponent(new LoadMoreTeams($start, $count)))->name('teams-more.loadMore');
    Route::get('directors-more/{start}/{count}', fn ($start, $count) => Blade::renderComponent(new LoadMoreDirectors($start, $count)))->name('directors-more.loadMore');
    Route::get('clients-more/{start}/{count}', fn ($start, $count) => Blade::renderComponent(new LoadMoreClients($start, $count)))->name('clients-more.loadMore');
    Route::get('certifications-more/{start}/{count}', fn ($start, $count) => Blade::renderComponent(new LoadMoreCertifications($start, $count)))->name('certifications-more.loadMore');
    Route::get('videos-more/{start}/{count}', fn ($start, $count) => Blade::renderComponent(new LoadMoreVideos($start, $count)))->name('videos-more.loadMore');






              route::get('careers', [PageController::class , 'careers'])->name('careers.index');
    route::get('news', [PageController::class , 'news'])->name('news.index');
    route::get('blogs', [PageController::class , 'blogs'])->name('blogs.index');




});
