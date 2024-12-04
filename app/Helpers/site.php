<?php

use App\Models\Pages;
use App\Models\Settings;
use App\Models\UserScript;


if (!function_exists('SETTING_SITE')) {
    function SETTING_SITE($key = false){
        $setting = @Settings::query()->where('key', 'site_setting')->where('featured', '1')->get()->first();
        if($setting != null){
            return  @$setting->values->where('key', $key)->first()->value;
        }
        else return "";
    }
}


if (!function_exists('getPages')) {
    function getPages($id = null) {
        if($id == ''){
            $pages = @Pages::query()->with('trans')->where('id','>',1)->Active()->get();
        }
        else{
            $pages = @Pages::query()->with('trans')->whereId($id)->first();
        }
        return $pages ;
    }
}




if (!function_exists('getScriptHeader')) {
    function getScriptHeader() {
        $pages = @UserScript::query()->active()->where('place' , 'header')->first()->script;
//             $pages = @Pages::query()->with('trans')->whereId($id)->first();
        return $pages ;
    }
}


if (!function_exists('getScriptFooter')) {
    function getScriptFooter() {
        $pages = @UserScript::query()->active()->where('place' , 'footer')->first()->script;
//             $pages = @Pages::query()->with('trans')->whereId($id)->first();
        return $pages ;
    }
}

