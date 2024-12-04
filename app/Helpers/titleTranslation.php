<?php

use App\Settings\TitleTranslationSingleton;

if (!function_exists('translateTitle')) {
    /**
     * Format a number as currency.
     *
     * @param float $amount
     * @return string
     */
    function translateTitle($key)
    {
        $title_translation = TitleTranslationSingleton::getInstance();
        return $title_translation->getItem($key);
    }
}
