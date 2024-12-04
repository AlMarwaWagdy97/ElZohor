<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Insurance;
use App\Settings\HomeSettingSingleton;
use Illuminate\Http\Request;

class InsuranceController extends Controller
{
    public $insurance;
    public $key;

//    public function __construct($key)
//    {
//        $this->insurance = InsuranceSingleTon::getInstance();
//        $this->key = $key;
//
//    }
//
//    function getVal($key, $lang)
//    {
//        return $this->insurance->getItem($key, app()->getLocale());
//    }


    public function index()
    {



        $insurance = Insurance::with(['trans' => function ($query) { $query->where('locale', app()->getLocale());}])
            ->latest()->active()->feature()->first();

        if($insurance) {
            return view('site.pages.insurance.index', compact('insurance'));
        }else{
            return redirect('/');
        }
    }
}
