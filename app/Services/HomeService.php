<?php

namespace App\Services;

use App\Models\Client;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Teams;
use App\Settings\HomeSettingSingleton;
use App\Settings\SettingSingleton;

class HomeService
{
    public $sliders, $teams, $clients, $products, $videos;

    public $modelHomeSetting, $settings;


    public function __construct()
    {

        $this->sliders = new Slider();
        $this->teams = new Teams();
        $this->clients = new Client();
        $this->products = new Product();


        $this->modelHomeSetting = HomeSettingSingleton::getInstance();
        $this->settings = SettingSingleton::getInstance();
    }


    // get Data --------------------------------------------------------------------------------------------------

    function getSlidersData()
    {
        return $this->sliders->with(['trans' => function ($query) {
            $query->where('locale', app()->getLocale());
        }])->orderBy('sort', 'ASC')->active()->get();
    }

    function getTeamsData()
    {
        return $this->teams->with(['trans' => function ($query) {
            $query->where('locale', app()->getLocale());
        }])->orderBy('sort', 'ASC')->feature()->active()->where('is_directors', 0)->get();
    }

    function getClientsData()
    {
        return $this->clients->orderBy('sort', 'ASC')->feature()->active()->get('image');
    }

    function getProductsData()
    {
        return $this->products->with(['trans' => function ($query) {
            $query->where('locale', app()->getLocale());
        }])->orderBy('sort', 'ASC')->feature()->active()->get();
    }

    function getVissionsData()
    {
        return [
            $this->modelHomeSetting->getItem('vision'),
            $this->modelHomeSetting->getItem('mission'),
            $this->modelHomeSetting->getItem('goals'),
        ];
    }

    function index()
    {
        $data['sliders'] = $this->getSlidersData();
        $data['teams'] = $this->getTeamsData();
        $data['clients'] = $this->getClientsData();
        $data['products'] = $this->getProductsData();

        $data['visions'] =  $this->getVissionsData();

        $data['settings'] = $this->settings;
        return $data;
    }
}
