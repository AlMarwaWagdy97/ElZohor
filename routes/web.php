<?php

use App\Http\Controllers\Site\BlogController;
use App\Http\Controllers\Site\GenerateSitemapController;
use App\Http\Livewire\Site\ApplyComponent;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Support\Facades\Blade;
use App\Http\Controllers\Site\CertificationController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\NewsController;
use App\Http\Controllers\Site\PageController;
use App\Http\Controllers\Site\ProductController;
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

    Route::controller(BlogController::class)->group(function () {
        Route::get('blogs', 'index')->name('blogs');
        Route::get('blogs/{slug}', 'show')->name('blogs.show');
    });

    Route::controller(NewsController::class)->group(function () {
        Route::get('news', 'index')->name('news');
        Route::get('news/{slug}', 'show')->name('news.show');
    });

    Route::controller(NewsController::class)->group(function () {
        Route::get('careers', 'index')->name('careers');
        Route::get('careers/{slug}', 'show')->name('careers.show');
    });

    Route::get('teams-more/{start}/{count}', fn ($start, $count) => Blade::renderComponent(new LoadMoreTeams($start, $count)))->name('teams-more.loadMore');
    Route::get('directors-more/{start}/{count}', fn ($start, $count) => Blade::renderComponent(new LoadMoreDirectors($start, $count)))->name('directors-more.loadMore');
    Route::get('clients-more/{start}/{count}', fn ($start, $count) => Blade::renderComponent(new LoadMoreClients($start, $count)))->name('clients-more.loadMore');
    Route::get('certifications-more/{start}/{count}', fn ($start, $count) => Blade::renderComponent(new LoadMoreCertifications($start, $count)))->name('certifications-more.loadMore');
    Route::get('videos-more/{start}/{count}', fn ($start, $count) => Blade::renderComponent(new LoadMoreVideos($start, $count)))->name('videos-more.loadMore');

    route::get('careers', [PageController::class , 'careers'])->name('careers.index');


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

//        Route::get('apply', ApplyComponent::class)->name('apply');
Route::get('apply/{career_id}' , [PageController::class , 'applyForJob'])->name('apply');
});
