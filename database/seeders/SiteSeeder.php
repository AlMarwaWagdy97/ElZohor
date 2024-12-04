<?php

namespace Database\Seeders;

use App\Models\Menue;
use App\Models\Services;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menues')->delete();
        DB::table('menue_translations')->delete();
        DB::table('sliders')->delete();
        DB::table('slider_translations')->delete();
        DB::table('categories')->delete();
        DB::table('categories_translations')->delete();
        DB::table('teams')->delete();
        DB::table('teams_translations')->delete();

        // create Offers

        $title_section = [
            'Home',
            'About',
            'Products',
            'Clients',
            'Teams',
            'Certifications',
            'Videos',
            'Contact',
        ];

        foreach ($title_section as $key => $title) {
            $dataTrans = []; // Initialize the $dataTrans variable inside the loop

            foreach (config('translatable.locales') as $locale) {
                $dataTrans[$locale]['title'] = Str::replace('_', ' ', $title);
                $dataTrans[$locale]['slug'] = Str::slug($title);
            }
            Menue::create([
                'parent_id' => null,
                // 'level' => $key,
                'type' => 'static',
                'sort' => $key,
                'url' => '#' . strtolower($title),
            ] + $dataTrans);
        }
    }
}
