<?php

use App\Http\Controllers\Site\InsuranceController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Support\Facades\Blade;
use App\Http\Controllers\Site\BookingController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\DoctorsController;
use App\Http\Controllers\Site\GalleryController;
use App\Http\Controllers\Site\OffersController;
use App\Http\Controllers\Site\PageController;
use App\Http\Controllers\Site\ServicesController;
use App\Http\Controllers\Site\SpecialitesController;
use App\Http\Controllers\Site\VideosController;
use App\View\Components\Site\LoadMoreGallery;
use App\View\Components\Site\LoadMoreOffers;
use App\View\Components\Site\LoadMoreServices;
use App\View\Components\Site\Doctors\LoadMoreDoctors;
use App\View\Components\Site\Doctors\LoadMoreBestDoctors;
use App\View\Components\Site\LoadMoreVideos;
use App\View\Components\Site\Specialites\LoadMoreSpecialites;

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
        Route::get('contact-us', 'contact')->name('contact-us');
    });

    Route::controller(SpecialitesController::class)->group(function () {
        Route::get('specialities', 'index')->name('specialites');
        Route::get('specialities/{slug}', 'show')->name('specialites.show');
    });

    Route::controller(DoctorsController::class)->group(function () {
        Route::get('doctors', 'index')->name('doctors');
        Route::get('doctors/{slug}', 'show')->name('doctors.show');
    });

    Route::controller(PageController::class)->group(function () {
        Route::get('pages/{slug}', 'show')->name('pages.show');
        Route::get('contact-us', 'contactUs')->name('contact-us');
    });

    Route::controller(ServicesController::class)->group(function () {
        Route::get('services', 'index')->name('services.index');
        Route::get('services/{slug}', 'show')->name('services.show');
    });

    Route::controller(OffersController::class)->group(function () {
        Route::get('offers', 'index')->name('offers.index');
        Route::get('offers/{slug}', 'show')->name('offers.show');
    });

    Route::controller(GalleryController::class)->group(function () {
        Route::get('gallery', 'index')->name('gallery.index');
        Route::get('gallery/{slug}', 'show')->name('gallery.show');
    });

    Route::controller(VideosController::class)->group(function () {
        Route::get('videos', 'index')->name('videos.index');
    });

    Route::get('booking', [BookingController::class, 'index'] )->name('booking');
    Route::get('/insurance', [InsuranceController::class, 'index'] )->name('insurance_show');

    Route::get('specialites-more/{start}/{count}', fn ($start, $count) => Blade::renderComponent(new LoadMoreSpecialites($start, $count)) )->name('specialites.loadMore');
    Route::get('doctors-more/{specialty_id}/{start}/{count}', fn ($specialty_id, $start, $count) => Blade::renderComponent(new LoadMoreDoctors($specialty_id, $start, $count)) )->name('doctors.loadMore');
    Route::get('best-doctors-more/{specialty_id}/{start}/{count}', fn ($specialty_id, $start, $count) => Blade::renderComponent(new LoadMoreBestDoctors($specialty_id, $start, $count)) )->name('best-doctors.loadMore');
    Route::get('services-more/{start}/{count}', fn ($start, $count) => Blade::renderComponent(new LoadMoreServices( $start, $count)) )->name('services-more.loadMore');
    Route::get('offers-more/{start}/{count}', fn ($start, $count) => Blade::renderComponent(new LoadMoreOffers( $start, $count)) )->name('offers-more.loadMore');
    Route::get('gallery-more/{start}/{count}', fn ($start, $count) => Blade::renderComponent(new LoadMoreGallery( $start, $count)) )->name('gallery-more.loadMore');
    Route::get('videos-more/{start}/{count}', fn ($start, $count) => Blade::renderComponent(new LoadMoreVideos( $start, $count)) )->name('videos-more.loadMore');

});
