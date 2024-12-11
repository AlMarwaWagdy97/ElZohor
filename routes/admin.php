<?php


use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CareerCategoryController;
use App\Http\Controllers\Admin\CareerController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\UserScriptController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\MenueController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ThemesController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SubscribesController;
use App\Http\Controllers\Admin\imageUploadController;
use App\Http\Controllers\Admin\HomeSettingPageController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Admin\Authorizations\RolesController;
use App\Http\Controllers\Admin\Authorizations\PermissionsController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TeamsController;
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

                // ----- categories -----------------------------------------------
                Route::post('categories/actions', [CategoryController::class, 'actions'])->name('categories.actions');
                Route::get('categories/update-status/{id}', [CategoryController::class, 'update_status'])->name('categories.update-status');
                Route::get('categories/update-featured/{id}', [CategoryController::class, 'update_featured'])->name('categories.update-featured');
                Route::get('categories/show_tree', [CategoryController::class, 'show_tree'])->name('categories.show_tree');
                Route::resource('categories', CategoryController::class);
                //--------------- End categories --------------------------------

                // ----- Products -----------------------------------------------
                Route::resource('products', ProductController::class);
                Route::post('products/actions', [ProductController::class, 'actions'])->name('products.actions');
                Route::get('products/update-status/{id}', [ProductController::class, 'update_status'])->name('products.update-status');
                Route::get('products/update-featured/{id}', [ProductController::class, 'update_featured'])->name('products.update-featured');
                //--------------- End Products ---------------------------------

                // ----- clients -----------------------------------------------
                Route::resource('clients', ClientController::class);
                Route::post('clients/actions', [ClientController::class, 'actions'])->name('clients.actions');
                Route::get('clients/update-status/{id}', [ClientController::class, 'update_status'])->name('clients.update-status');
                Route::get('clients/update-featured/{id}', [ClientController::class, 'update_featured'])->name('clients.update-featured');
                //--------------- End clients ---------------------------------

                // ----- Teams -----------------------------------------------
                Route::resource('teams', TeamsController::class);
                Route::post('teams/actions', [TeamsController::class, 'actions'])->name('teams.actions');
                Route::get('teams/update-status/{id}', [TeamsController::class, 'update_status'])->name('teams.update-status');
                Route::get('teams/update-featured/{id}', [TeamsController::class, 'update_featured'])->name('teams.update-featured');
                Route::get('teams/update-directors/{id}', [TeamsController::class, 'update_directors'])->name('teams.update-directors');
                //--------------- End Teams ---------------------------------

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


                // ----- news -----------------------------------------------
                Route::resource('news', NewsController::class);
                Route::get('news/update-status/{id}', [NewsController::class, 'update_status'])->name('news.update-status');
                Route::get('news/update-featured/{id}', [NewsController::class, 'update_featured'])->name('news.update-featured');

                Route::post('news/upload', [NewsController::class, 'upload'])->name('ckeditor.upload');
                Route::post('news/actions', [NewsController::class, 'actions'])->name('news.actions');

                // ----- blogs -----------------------------------------------
                Route::resource('blogs', BlogController::class);
                Route::get('blogs/update-status/{id}', [BlogController::class, 'update_status'])->name('blogs.update-status');
                Route::get('blogs/update-featured/{id}', [BlogController::class, 'update_featured'])->name('blogs.update-featured');

                Route::post('blogs/upload', [BlogController::class, 'upload'])->name('ckeditor.upload');
                Route::post('blogs/actions', [BlogController::class, 'actions'])->name('blogs.actions');


                // ----- careers -----------------------------------------------
                Route::resource('careers', CareerController::class);
                Route::get('careers/update-status/{id}', [CareerController::class, 'update_status'])->name('careers.update-status');
                Route::get('careers/update-featured/{id}', [CareerController::class, 'update_featured'])->name('careers.update-featured');

                Route::post('careers/upload', [CareerController::class, 'upload'])->name('ckeditor.upload');
                Route::post('careers/actions', [CareerController::class, 'actions'])->name('careers.actions');


                // ----- careers categories -----------------------------------------------
                Route::resource('careers_categories', CareerCategoryController::class);
                Route::get('careers_categories/update-status/{id}', [CareerCategoryController::class, 'update_status'])->name('careers_categories.update-status');
                Route::get('careers_categories/update-featured/{id}', [CareerCategoryController::class, 'update_featured'])->name('careers_categories.update-featured');

                Route::post('careers_categories/upload', [CareerCategoryController::class, 'upload'])->name('ckeditor.upload');
                Route::post('careers_categories/actions', [CareerCategoryController::class, 'actions'])->name('careers_categories.actions');


                /***********************user scripts************************/
                Route::resource('user_scripts', UserScriptController::class)->except('edit', 'update', 'show');
                Route::get('user_scripts/update-status/{id}', [UserScriptController::class, 'update_status'])->name('user_scripts.update-status');
                Route::post('user_scripts_all_post', [UserScriptController::class, 'updateAll'])->name('user_scripts.update_all');
                Route::get('user_scripts_all', [UserScriptController::class, 'editAll'])->name('user_scripts.editAll');


            });
        });
    });


    Route::get('admin/update_featured/{id}', [SettingsController::class, 'update_feature']);

});
