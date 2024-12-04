<?php

namespace App\Enums;

class UrlTypesEnum
{



    public const PAGES = 'pages';
    public const SPECIALTIES = 'specialities';
    public const DOCTORS = 'doctors';
    public const SERVICES = 'services';
    public const OFFER = 'offer';
    public const GALLERY = 'gallery';
    public const VIDEO = 'video';

    public const ALL_SPECIALTIES = 'all specialities';
    public const ALL_DOCTORS = 'all doctors';
    public const ALL_SERVICES = 'all services';
    public const ALL_OFFERS = 'all offers';
    public const ALL_GALLERY = 'all gallery';
    public const ALL_VIDEOS = 'all videos';
    public const CONTACTUS = 'contact us';
    public const INSURANCE = 'insurance';




    public static function values(): array
    {

        return [
            static::PAGES => 'pages',
            static::SPECIALTIES => 'specialities',
            static::DOCTORS => 'doctors',
            static::SERVICES => 'services',
            static::OFFER => 'offer',
            static::GALLERY => 'gallery',
            static::VIDEO => 'video',

            static::ALL_SPECIALTIES => 'all specialities',
            static::ALL_DOCTORS => 'all doctors',
            static::ALL_SERVICES => 'all services',
            static::ALL_OFFERS => 'all offers',
            static::ALL_GALLERY => 'all gallery',
            static::ALL_VIDEOS => 'all videos',
            static::CONTACTUS => 'contact us',
            static::INSURANCE => 'insurance',
        ];
    }
}
