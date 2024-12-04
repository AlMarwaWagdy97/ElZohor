<?php


use App\Http\Controllers\Admin\InsuranceController;
use App\Http\Controllers\Admin\TitleTranslationController;
use App\Http\Controllers\Admin\UserScriptController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\MenueController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ThemesController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SubscribesController;
use App\Http\Controllers\Admin\imageUploadController;
use App\Http\Controllers\Admin\SpecialtiesController;
use App\Http\Controllers\Admin\HomeSettingPageController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Admin\Authorizations\RolesController;
use App\Http\Controllers\Admin\Authorizations\PermissionsController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\ReviewsController;
use App\Http\Controllers\Admin\VideoController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//   prefix Languages
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localize', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath'], // Route translate middleware
], function () {

    Route::group(['as' => 'admin.', 'prefix' => 'admin'], function () {

        Route::get('/', function () {
            return redirect()->route('admin.login');
        });

        // AUTH PAGE ---------------------------------------------------------------
        Route::group(['middleware' => 'RedirectDashboard'], function () {
            Route::controller(AuthController::class)->group(function () {
                Route::get('login', 'showLogin')->name('login');
                Route::POST('post-login', 'login')->name('post-login');
            });
        });


        // Dashboard Pages ---------------------------------------------------------------
        Route::group(['middleware' => 'CheckAdminAuth'], function () {

            Route::controller(AuthController::class)->group(function () {
                Route::post('logout', 'logout')->name('logout');
            });
            Route::group(['middleware' => 'CheckPermissionRoute'], function () {

                Route::controller(DashboardController::class)->group(function () {
                    Route::get('dashboard', 'home')->name('home');
                });

                // ---------------------- Profile -----------------------------//
                Route::resource('profile', ProfileController::class)->only(['edit', 'update']);
                // ---------------------- End Profile -----------------------------//

                // ----- Admins -----------------------------------------------
                Route::resource('users', AdminController::class);
                Route::post('users/actions', [AdminController::class, 'actions'])->name('users.actions');
                Route::get('users/update-status/{id}', [AdminController::class, 'update_status'])->name('users.update-status');
                //--------------- End Admins ----------//

                // ----- Authorization -----------------------------------------------
                Route::resource('permissions', PermissionsController::class);
                Route::resource('roles', RolesController::class);
                // Route::get('permissions/restore', [PermissionsController::class, 'RestoreAllRoutes'])->name('permissions.restore');
                // ----- End Authorization -------------------------------------------

                //--------------- Start Menus -----------------------------------------------------------------------//
                Route::resource('menus', MenueController::class);
                Route::get('show-menu-tree', [MenueController::class, 'show_tree'])->name('menus.show_tree');
                Route::post('menus/actions', [MenueController::class, 'actions'])->name('menus.actions');
                Route::get('menus/update-status/{id}', [MenueController::class, 'update_status'])->name('menus.update-status');
                Route::get('tree/get-urls', [MenueController::class, 'getUrl'])->name('menus.getUrl');
                Route::get('get-menus', [MenueController::class, 'getMenus'])->name('menus.getMenus');
                //--------------- End Menus -----------------------------------------------------------------------//

                // ----- Pages -----------------------------------------------
                Route::resource('pages', PagesController::class);
                Route::get('pages/update-status/{id}', [PagesController::class, 'update_status'])->name('pages.update-status');
                Route::post('pages/actions', [PagesController::class, 'actions'])->name('pages.actions');
                // ----- End Pages -------------------------------------------

                //----------------Start Sliders----------------------------//
                Route::resource('slider', SliderController::class);
                Route::get('slider/update-status/{id}', [SliderController::class, 'update_status'])->name('slider.update-status');
                Route::post('slider/actions', [SliderController::class, 'actions'])->name('slider.actions');
                //----------------End Sliders----------------------------//

                // ----- ContactUs -----------------------------------------------
                Route::resource('contact-us', ContactUsController::class);
                Route::post('contact-us/read', [ContactUsController::class, 'read'])->name('contact-us.read');
                Route::get('/notifications/markAll', [ContactUsController::class, 'markAll'])->name('notification.read');
                //--------------- End ContactUs ---------------------------------

                // ----- subscribes -----------------------------------------------
                Route::resource('subscribes', SubscribesController::class);
                //--------------- End subscribes ---------------------------------

                // ----- Specialties -----------------------------------------------
                Route::resource('specialties', SpecialtiesController::class);
                Route::post('specialties/actions', [SpecialtiesController::class, 'actions'])->name('specialties.actions');
                Route::get('specialties/update-status/{id}', [SpecialtiesController::class, 'update_status'])->name('specialties.update-status');
                Route::get('specialties/update-featured/{id}', [SpecialtiesController::class, 'update_featured'])->name('specialties.update-featured');
                //--------------- End Specialties ---------------------------------

                // ----- doctors -----------------------------------------------
                Route::resource('doctors', DoctorController::class);
                Route::post('doctors/actions', [DoctorController::class, 'actions'])->name('doctors.actions');
                Route::get('doctors/update-status/{id}', [DoctorController::class, 'update_status'])->name('doctors.update-status');
                Route::get('doctors/update-featured/{id}', [DoctorController::class, 'update_featured'])->name('doctors.update-featured');
                //--------------- End doctors ---------------------------------

                // ----- booking -----------------------------------------------
                Route::resource('booking', BookingController::class);
                Route::post('booking/actions', [BookingController::class, 'actions'])->name('booking.actions');
                Route::get('booking/update-status/{id}', [BookingController::class, 'update_status'])->name('booking.update-status');
                Route::get('booking/update-featured/{id}', [BookingController::class, 'update_featured'])->name('booking.update-featured');
                //--------------- End booking ---------------------------------

                // ----- reviews -----------------------------------------------
                Route::resource('reviews', ReviewsController::class);
                Route::post('reviews/actions', [ReviewsController::class, 'actions'])->name('reviews.actions');
                Route::get('reviews/update-status/{id}', [ReviewsController::class, 'update_status'])->name('reviews.update-status');
                Route::get('reviews/update-featured/{id}', [ReviewsController::class, 'update_featured'])->name('reviews.update-featured');
                //--------------- End reviews ---------------------------------

                // ----- gallery -----------------------------------------------
                Route::resource('gallery', GalleryController::class);
                Route::post('gallery/actions', [GalleryController::class, 'actions'])->name('gallery.actions');
                Route::get('gallery/update-status/{id}', [GalleryController::class, 'update_status'])->name('gallery.update-status');
                Route::get('gallery/update-featured/{id}', [GalleryController::class, 'update_featured'])->name('gallery.update-featured');
                //--------------- End gallery ---------------------------------

                // ----- videos -----------------------------------------------
                Route::resource('videos', VideoController::class);
                Route::post('videos/actions', [VideoController::class, 'actions'])->name('videos.actions');
                Route::get('videos/update-status/{id}', [VideoController::class, 'update_status'])->name('videos.update-status');
                Route::get('videos/update-featured/{id}', [VideoController::class, 'update_featured'])->name('videos.update-featured');
                //--------------- End videos ---------------------------------

                // ----- Services -----------------------------------------------
                Route::resource('services', ServicesController::class);
                Route::get('services/update-status/{id}', [ServicesController::class, 'update_status'])->name('services.update-status');
                Route::post('services/actions', [ServicesController::class, 'actions'])->name('services.actions');
                Route::get('services/update-featured/{id}', [ServicesController::class, 'update_featured'])->name('services.update-featured');
                // ----- End Services -------------------------------------------

                // ----- offers -----------------------------------------------
                Route::resource('news', NewsController::class);
                Route::post('news/actions', [NewsController::class, 'actions'])->name('news.actions');
                Route::get('news/update-status/{id}', [NewsController::class, 'update_status'])->name('news.update-status');
                Route::get('news/update-featured/{id}', [NewsController::class, 'update_featured'])->name('news.update-featured');
                //--------------- End offers ---------------------------------

                // ---------- settings --------------------------------------------
                Route::get('settings', [SettingsController::class, 'index'])->name('settings.index');
                Route::get('settings/{key}', [SettingsController::class, 'form'])->name('settings.form');
                Route::post('settings-update/{id}', [SettingsController::class, 'form_update'])->name('settings.update');
                Route::post('settings-update-custom/{slug}', [SettingsController::class, 'form_update_custom'])->name('settings.update-custom');
                // ----- End settings -------------------------------------------

                // ----- Themes -----------------------------------------------
                Route::get('themes/dashboard', [ThemesController::class, 'dashboardTheme'])->name('themes.dashboard');
                Route::post('themes/dashboard', [ThemesController::class, 'Themes_update'])->name('themes.update');
                Route::post('themes/reset', [ThemesController::class, 'Themes_reset'])->name('themes.reset');
                Route::get('themes/site', [ThemesController::class, 'siteTheme'])->name('themes.site');
                // ----- End Themes -------------------------------------------

                // ----- SettingHome -----------------------------------------------
                Route::resource('home-settings', HomeSettingPageController::class);
                Route::get('home-settings/update-status/{id}', [HomeSettingPageController::class, 'update_status'])->name('home-settings.update-status');
                Route::post('home-settings/upload', [imageUploadController::class, 'upload'])->name('ckeditor.upload');


                // ----- SettingHome -----------------------------------------------
                Route::resource('title-translation', TitleTranslationController::class);



                Route::resource('insurance' , InsuranceController::class );
                Route::get('insurance/update-status/{id}', [InsuranceController::class, 'update_status'])->name('insurance.update-status');
                Route::get('insurance/update-featured/{id}', [InsuranceController::class, 'update_featured'])->name('insurance.update-featured');




                /***********************user scripts************************/
                Route::resource('user_scripts' , UserScriptController::class )->except('edit' , 'update' , 'show');
                Route::get('user_scripts/update-status/{id}', [UserScriptController::class, 'update_status'])->name('user_scripts.update-status');
                Route::post('user_scripts_all_post' , [UserScriptController::class , 'updateAll'] )->name('user_scripts.update_all');
                Route::get('user_scripts_all' , [UserScriptController::class , 'editAll'] )->name('user_scripts.editAll');




            });
        });
    });
});
// require __DIR__.'/auth.php';
