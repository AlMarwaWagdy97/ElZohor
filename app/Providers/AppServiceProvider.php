<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }


    public function boot()
    {
        Paginator::useBootstrap();
    //     Model::preventLazyLoading(
    //         // Returns `true` unless it's the production environment.
    //       ! app()->isProduction()
    //   );
    }
}
