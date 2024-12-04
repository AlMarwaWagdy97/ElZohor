<?php

namespace App\Http\Controllers\Site;

use App\Models\Teams;
use App\Settings\SettingSingleton;
use App\Http\Controllers\Controller;
use App\Settings\HomeSettingSingleton;

class TeamsController extends Controller
{
    public function index()
    {
        $teams = Teams::query()->with('trans')->active()->orderBy('sort', 'ASC')->limit( @request()->key ?? 6 )->get();

        $teamInfo = HomeSettingSingleton::getInstance()->getItem('teams');

        $settings = SettingSingleton::getInstance();

        return view('site.pages.teams.index', compact('teams', 'teamInfo', 'settings'));
    }


    public function show($slug)
    {

        if (is_numeric($slug)) {
            $team = Teams::findOrFail($slug);
        } else {
            $team = Teams::with('trans')->WhereTranslation('slug', $slug)->get()->first();
            if ($team == null) abort('404');
        }

        return view('site.pages.teams.show', compact('team'));
    }
}
