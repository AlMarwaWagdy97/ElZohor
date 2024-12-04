<?php

namespace App\Providers;

use App\Models\SettingsValues;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Settings\SettingSingleton;

class ViewServiceProvider extends ServiceProvider
{

    public function register()
    {
        //
    }


    public function boot()
    {

        if (Schema::hasTable('settings_values')) {
            $currentLang = app()->getLocale();

            // $settings  = @SettingsValues::query();
            $settings  = SettingSingleton::getInstance();

            //  meta setting  ---------------------------------------------------------
            $metaSetting =  $settings->getMetaSetting();

            //  Site  setting  ---------------------------------------------------------
            $settingsSite = $settings->getSiteSetting();

            if ($settingsSite != null) {
                $SiteSetting['site_name'] = @$settingsSite->where('key', 'site_name_' . $currentLang)->first()->value;
                $SiteSetting['logo'] = @$settingsSite->where('key', 'logo_' . $currentLang)->first()->value;
                $SiteSetting['icon'] = @$settingsSite->where('key', 'icon')->first()->value;

                view()->share('metaSetting', $metaSetting);
                view()->share('SiteSetting', $SiteSetting);
            }
        }
    }
}
