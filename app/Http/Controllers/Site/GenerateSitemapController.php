<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

use App\Models\Gallery;
use App\Models\Pages;
use App\Models\Product;
use App\Models\Teams;
use Illuminate\Http\Request;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemapController extends Controller
{
    public function generate(){
        $sitemap = Sitemap ::create();


        $sitemap->add(Url::create(url('/'))
            ->setPriority(1.0)
            ->setChangeFrequency('daily')
            ->setLastModificationDate(now()));




        /******#############################***single pages *******############################*********/
        $sitemap->add(Url::create(route('site.about-us'))
            ->setPriority(0.9)
            ->setChangeFrequency('daily')
            ->setLastModificationDate(now()));

        $sitemap->add(Url::create(route('site.contact-us'))
            ->setPriority(0.8)
            ->setChangeFrequency('daily')
            ->setLastModificationDate(now()));


        $sitemap->add(Url::create(route('site.certifications'))
            ->setPriority(0.7)
            ->setChangeFrequency('daily')
            ->setLastModificationDate(now()));


        $sitemap->add(Url::create(route('site.clients'))
            ->setPriority(0.5)
            ->setChangeFrequency('daily')
            ->setLastModificationDate(now()));


        $sitemap->add(Url::create(route('site.teams'))
            ->setPriority(0.2)
            ->setChangeFrequency('daily')
            ->setLastModificationDate(now()));



        /*****##########################****end ingle pages *******####################################*********/





        /**********products inside generate***********/
        Product::active()->get()->each(function (Product $product) use ($sitemap) {
            $sitemap->add(Url::create(route('site.products.show', $product->slug))
                ->setPriority(0.8)
            );
        });
        /**********end products inside generate***********/


        /**********pages inside generate***********/
        Pages::active()->get()->each(function (Pages $page) use ($sitemap) {
            $sitemap->add(Url::create(route('site.pages', $page->slug))
                ->setPriority(0.5)
            );
        });
        /**********end pages inside generate***********/



        /**********certifications inside generate***********/
        Gallery::active()->get()->each(function (Gallery $gallery) use ($sitemap) {
            $sitemap->add(Url::create(route('site.certifications.show', $gallery->slug))
                ->setPriority(0.5)
            );
        });
        /**********end certifications inside generate***********/

        /**********teams inside generate***********/
        Teams::active()->get()->each(function (Teams $team) use ($sitemap) {
            $sitemap->add(Url::create(route('site.teams.show', $team->slug))
                ->setPriority(0.3)
            );
        });
        /**********end certifications inside generate***********/




        // Save the sitemap to the public directory
        $sitemap->writeToFile(public_path('sitemap/sitemap.xml'));

        // Generate sitemap file here
        return response()->download(public_path('sitemap/sitemap.xml'), 'sitemap.xml');

        // return $sitemap;
    }














    /******************products********************/

    public function products(){

        $sitemap = Sitemap ::create();
        $sitemap->add(Url::create(route('site.products'))
            ->setPriority(0.8)
            ->setChangeFrequency('daily')
            ->setLastModificationDate(now()));

        // Save the sitemap to the public directory
        $sitemap->writeToFile(public_path('sitemap/products_sitemap.xml'));
        // Generate sitemap file here
        return response()->download(public_path('sitemap/products_sitemap.xml'), 'products_sitemap.xml');
    }

    public function singleProduct($slug){
        $sitemap = Sitemap ::create();
        $sitemap->add(Url::create(route('site.products.show', $slug))
            ->setPriority(0.5)
            ->setChangeFrequency('daily')
            ->setLastModificationDate(now()));

        // Save the sitemap to the public directory
        $sitemap->writeToFile(public_path('sitemap/singleProduct_sitemap.xml'));
        // Generate sitemap file here
        return response()->download(public_path('sitemap/singleProduct_sitemap.xml'), 'singleProduct_sitemap.xml');
    }

    /******************end products********************/


    /******************certifications********************/

    public function certifications(){

        $sitemap = Sitemap ::create();
        $sitemap->add(Url::create(route('site.certifications'))
            ->setPriority(0.5)
            ->setChangeFrequency('daily')
            ->setLastModificationDate(now()));

        // Save the sitemap to the public directory
        $sitemap->writeToFile(public_path('sitemap/certifications_sitemap.xml'));
        // Generate sitemap file here
        return response()->download(public_path('sitemap/certifications_sitemap.xml'), 'certifications_sitemap.xml');
    }

    public function singleCertificate($slug){
        $sitemap = Sitemap ::create();
        $sitemap->add(Url::create(route('site.certifications.show', $slug))
            ->setPriority(0.5)
            ->setChangeFrequency('daily')
            ->setLastModificationDate(now()));

        // Save the sitemap to the public directory
        $sitemap->writeToFile(public_path('sitemap/singleCertificate_sitemap.xml'));
        // Generate sitemap file here
        return response()->download(public_path('sitemap/singleCertificate_sitemap.xml'), 'singleCertificate_sitemap.xml');
    }

    /******************end certifications********************/




    /******************videos********************/

    public function videos(){

        $sitemap = Sitemap ::create();
        $sitemap->add(Url::create(route('site.videos'))
            ->setPriority(0.3)
            ->setChangeFrequency('daily')
            ->setLastModificationDate(now()));

        // Save the sitemap to the public directory
        $sitemap->writeToFile(public_path('sitemap/videos_sitemap.xml'));
        // Generate sitemap file here
        return response()->download(public_path('sitemap/videos_sitemap.xml'), 'videos_sitemap.xml');
    }

    public function singleVideo($slug){
        $sitemap = Sitemap ::create();
        $sitemap->add(Url::create(route('site.videos.show', $slug))
            ->setPriority(0.3)
            ->setChangeFrequency('daily')
            ->setLastModificationDate(now()));

        // Save the sitemap to the public directory
        $sitemap->writeToFile(public_path('sitemap/singleVideo_sitemap.xml'));
        // Generate sitemap file here
        return response()->download(public_path('sitemap/singleVideo_sitemap.xml'), 'singleVideo_sitemap.xml');
    }

    /******************end videos********************/




    /******************teams********************/

    public function teams(){

        $sitemap = Sitemap ::create();
        $sitemap->add(Url::create(route('site.teams'))
            ->setPriority(0.5)
            ->setChangeFrequency('daily')
            ->setLastModificationDate(now()));

        // Save the sitemap to the public directory
        $sitemap->writeToFile(public_path('sitemap/teams_sitemap.xml'));
        // Generate sitemap file here
        return response()->download(public_path('sitemap/teams_sitemap.xml'), 'teams_sitemap.xml');
    }

    public function singleTeam($slug){
        $sitemap = Sitemap ::create();
        $sitemap->add(Url::create(route('site.teams.show', $slug))
            ->setPriority(0.5)
            ->setChangeFrequency('daily')
            ->setLastModificationDate(now()));

        // Save the sitemap to the public directory
        $sitemap->writeToFile(public_path('sitemap/singleTeam_sitemap.xml'));
        // Generate sitemap file here
        return response()->download(public_path('sitemap/singleTeam_sitemap.xml'), 'singleTeam_sitemap.xml');
    }

    /******************end teams********************/




    /****************############################****single functions****#####################*********/
    /******************clients********************/

    public function clients(){

        $sitemap = Sitemap ::create();
        $sitemap->add(Url::create(route('site.clients'))
            ->setPriority(0.5)
            ->setChangeFrequency('daily')
            ->setLastModificationDate(now()));

        // Save the sitemap to the public directory
        $sitemap->writeToFile(public_path('sitemap/clients_sitemap.xml'));
        // Generate sitemap file here
        return response()->download(public_path('sitemap/clients_sitemap.xml'), 'clients_sitemap.xml');
    }

    /******************end clients********************/


    /******************about********************/

    public function about(){

        $sitemap = Sitemap ::create();
        $sitemap->add(Url::create(route('site.about-us'))
            ->setPriority(0.9)
            ->setChangeFrequency('daily')
            ->setLastModificationDate(now()));

        // Save the sitemap to the public directory
        $sitemap->writeToFile(public_path('sitemap/about_sitemap.xml'));
        // Generate sitemap file here
        return response()->download(public_path('sitemap/about_sitemap.xml'), 'about_sitemap.xml');
    }

    /******************end about********************/

    /******************about********************/

    public function contactUs(){

        $sitemap = Sitemap ::create();
        $sitemap->add(Url::create(route('site.contact-us'))
            ->setPriority(0.7)
            ->setChangeFrequency('daily')
            ->setLastModificationDate(now()));

        // Save the sitemap to the public directory
        $sitemap->writeToFile(public_path('sitemap/contact_sitemap.xml'));
        // Generate sitemap file here
        return response()->download(public_path('sitemap/contact_sitemap.xml'), 'contact_sitemap.xml');
    }

    /******************end contact********************/
    /****************############################****end single functions****#####################*********/




}
