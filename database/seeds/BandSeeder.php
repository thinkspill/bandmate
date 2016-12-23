<?php

use Illuminate\Database\Seeder;

class BandSeeder extends Seeder
{
    public function run()
    {
        factory(App\Band::class, 20)->create()->each(function ($u) {
            $numberOfAlbums = random_int(1, 5);
            while ($numberOfAlbums > 0) {
                $u->albums()->save(factory(App\Album::class)->make());
                $numberOfAlbums--;
            }
        });
    }
}
