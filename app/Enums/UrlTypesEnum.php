<?php

namespace App\Enums;

class UrlTypesEnum
{



    public const PAGES = 'pages';
    public const PRODUCTS = 'products';
    public const CLIENTS = 'clients';


    public const CERTIFICATIONS = 'certifications';
    public const VIDEO = 'videos';

    public const CAREERS = 'careers';
    public const BLOGS = 'blogs';
    public const NEWS = 'news';
    public const TEAMS = 'teams';
    public const ABOUTUS = 'about us';
    public const CONTACTUS = 'contact us';
    public const CATEGORIES = 'categories';


   /***************************************************/
    public const ALL_PRODUCTS = 'all products';
    public const ALL_CLIENTS = 'all clients';

    public const ALL_CAREERS = 'all careers';
    public const ALL_BLOGS = 'all blogs';
    public const ALL_NEWS = 'all news';
    public const ALL_VIDEOS = 'all videos';
    public const ALL_CERTIFICATIONS = 'all certifications';

    public const ALL_TEAMS = 'all teams';
    public const ALL_CATEGORIES = 'all categories';

    /***************************************************/








    public static function values(): array
    {

        return [
            static::PAGES => 'pages',
            static::PRODUCTS => 'products',
            static::CLIENTS => 'clients',

            static::TEAMS => 'teams',
            static::CAREERS => 'careers',
            static::BLOGS => 'blogs',
            static::NEWS => 'news',
            static::CERTIFICATIONS => 'certuifications',
            static::VIDEO => 'video',
            static::CATEGORIES => 'categories',



            static::ALL_PRODUCTS => 'all products',
            static::ALL_CLIENTS => 'all clients',

            static::ALL_TEAMS => 'all teams',
            static::ALL_CAREERS => 'all careers',
            static::ALL_BLOGS => 'all blogs',
            static::ALL_NEWS => 'all news',
            static::ALL_CERTIFICATIONS => 'all certifications',
            static::ALL_VIDEOS => 'all videos',



            static::ABOUTUS => 'about us',
            static::CONTACTUS => 'contact us',
            static::ALL_CATEGORIES => 'all categories',


        ];
    }
}
