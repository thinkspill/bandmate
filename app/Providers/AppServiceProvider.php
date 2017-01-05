<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $randomAlbumCover = $this->getAlbumCoverFunction();
        $randomAlbumText = $this->getAlbumTextFunction();
        $brandEasterEgg = random_int(0, 99) > 95 ? '<span title=":)">OI</span>' : 'B&';
        View::share('brandEasterEgg', $brandEasterEgg);
        View::share('randomAlbumCover', $randomAlbumCover);
        View::share('randomAlbumText', $randomAlbumText);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() == 'local') {
            $this->app->register('Laracasts\Generators\GeneratorsServiceProvider');
        }
    }

    private function getAlbumCoverFunction()
    {
        return function () {
            $albumCoverCategories = [
                'abstract',
                'city',
                'nightlife',
                'nature',
                'cats',
            ];

            $key = array_rand($albumCoverCategories);
            $category = $albumCoverCategories[$key];
            $size = random_int(300, 400);

            return "http://lorempixel.com/$size/$size/$category/";
        };
    }

    private function getAlbumTextFunction()
    {
        return function () {
            $albumCoverFonts = [
                'Palatino',
                '"Comic Sans MS"',
                'Helvetica',
                '"Times New Roman"',
                '"Avant Garde"',
            ];
            $key = array_rand($albumCoverFonts);

            return $albumCoverFonts[$key];
        };
    }
}
