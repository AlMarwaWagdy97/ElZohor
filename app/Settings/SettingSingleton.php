<?php

namespace App\Settings;

use App\Models\Settings;


class SettingSingleton
{
    private static $instance;
    private $settings;
    private $siteSetting, $colorsSetting, $giftSetting, $metaSetting;

    private function __construct()
    {
        // Prevent instantiation
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new SettingSingleton();
            self::$instance->loadSettingDatabase();
        }
        return self::$instance;
    }

    private function loadSettingDatabase()
    {
        // Code to retrieve header and footer content from the database
        // Example:

        $this->settings = Settings::with('values')->get();

        $this->siteSetting = (clone $this->settings)->where('key', 'site_setting')->first()?->values;

        $this->metaSetting = (clone $this->settings)->where('key', 'meta_setting')->first()?->values;

        $this->colorsSetting = (clone $this->settings)->where('key', 'color_setting')->first()?->values;

        $this->giftSetting = (clone $this->settings)->where('key', 'gift_setting')->first()?->values;
    }

    public function getSiteSetting()
    {
        return $this->siteSetting->where('featured' , 1);
//        return $this->siteSetting;

    }

    public function getColorSetting()
    {
        return $this->colorsSetting;
    }

    public function getGiftSetting()
    {
        return $this->giftSetting;
    }
    public function getMetaSetting()
    {
        return $this->metaSetting;
    }


    public function getItem($val)
    {
        $value ="";
        if(substr($val, -3) == "_en" || substr($val, -2) ==  "_ar"){
            $val = substr($val, 0, -3) . '_'.app()->getLocale();
        }

         switch ($val) {
            case 'site_name':
                $value = $this->siteSetting->where('key', 'site_name_' .app()->getLocale() )->first()?->value;
                break;
            case 'logo':
                $value = $this->siteSetting->where('key', 'logo_' .app()->getLocale() )->first()?->value;
                break;
            case 'address':
                $value = $this->siteSetting->where('key', 'address_' .app()->getLocale() )->first()?->value;
                break;
            case 'openTime':
                $value = $this->siteSetting->where('key', 'open_' .app()->getLocale() )->first()?->value;
                break;
            case 'footer_description':
                $value = $this->siteSetting->where('key', 'footer_description_' .app()->getLocale() )->first()?->value;
                break;
            case 'director_speech':
                $value = $this->siteSetting->where('key', 'director_speech_' .app()->getLocale() )->first()?->value;
                break;
            default:
                if(substr($val, -3) == "_en" || substr($val, -2) ==  "_ar"){
                    $val = substr($val, 0, -3) . '_'.app()->getLocale();
                }
                $value = $this->siteSetting->where('key', $val)->first()?->value;
        }
        return   $value;
    }

    public function getItemFeatured($val)
    {
//        $value ="";
//        if(substr($val, -3) == "_en" || substr($val, -2) ==  "_ar"){
//            $val = substr($val, 0, -3) . '_'.app()->getLocale();
//        }

//        switch ($val) {
//            case 'site_name':
//                $value = $this->siteSetting->where('key', 'site_name_' .app()->getLocale() )->first()?->value;
//                break;
//            case 'logo':
//                $value = $this->siteSetting->where('key', 'logo_' .app()->getLocale() )->first()?->value;
//                break;
//            case 'address':
//                $value = $this->siteSetting->where('key', 'address_' .app()->getLocale() )->first()?->value;
//                break;
//            case 'openTime':
//                $value = $this->siteSetting->where('key', 'open_' .app()->getLocale() )->first()?->value;
//                break;
//            case 'footer_description':
//                $value = $this->siteSetting->where('key', 'footer_description_' .app()->getLocale() )->first()?->value;
//                break;
//            case 'director_speech':
//                $value = $this->siteSetting->where('key', 'director_speech_' .app()->getLocale() )->first()?->value;
//                break;
//            default:
//                if(substr($val, -3) == "_en" || substr($val, -2) ==  "_ar"){
//                    $val = substr($val, 0, -3) . '_'.app()->getLocale();
//                }
//                $feature = false;
//        }
        $model =$this->siteSetting->where('key', $val)->first();
        if($model && $model->featured == 1){
          $feature = true;
        }else{
            $feature = false;
        }
        return   $feature;
    }


    public function getColor($val)
    {
        return array_filter(json_decode( $this->colorsSetting->where('key', $val)->first()?->value));
    }

    public function getGift($val)
    {
        return $this->giftSetting->where('key', $val)->first()?->value;
    }

    public function getMeta($val)
    {
        return $this->metaSetting->where('key', $val)->first()?->value;
    }

}
