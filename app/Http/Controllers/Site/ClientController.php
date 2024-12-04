<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Settings\HomeSettingSingleton;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::query()->with('trans')->active()->orderBy('sort', 'ASC')->limit(8)->get();

        $clientInfo = HomeSettingSingleton::getInstance()->getItem('videos');

        return view('site.pages.clients.index',compact('clients', 'clientInfo'));
    }


    public function show($slug)
    {

        if(is_numeric($slug)){
            $client = Client::findOrFail($slug);
        }
        else{
            $client = Client::with('trans')->WhereTranslation('slug', $slug)->get()->first();
            if($client == null) abort('404');
        }

        return view('site.pages.clients.show',compact('client'));
    }
}
