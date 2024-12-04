<?php

namespace App\Settings;

use App\Models\TitleTranslation;

class TitleTranslationSingleton
{
    private static $instance;

    private $title_translations;

    private function __construct()
    {
        // Prevent instantiation
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new TitleTranslationSingleton();
            self::$instance->loadTitleTranslationDatabase();
        }
        return self::$instance;
    }



    private function loadTitleTranslationDatabase()
    {
        $this->title_translations = TitleTranslation::get();
    }


    public function getItem($val)
    {
        $titleTranslation = $this->title_translations->where('key' ,  $val)->where('status' ,  1)->first();
        $lang =app()->getLocale();
        if( $titleTranslation && is_object(json_decode($titleTranslation->value))){
           return json_decode($titleTranslation->value)->$lang;
       }
    }

}
