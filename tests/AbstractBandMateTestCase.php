<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

abstract class AbstractBandMateTestCase extends TestCase
{
    use DatabaseTransactions;

    protected function makeTestAlbum()
    {
        $testName = 'test'.random_int(1111, 9999);
        factory(App\Album::class)->create(['name' => $testName]);

        $albumId =
            \App\Album::where('name', '=', $testName)->get(['id'])->first()->id;

        return ['name' => $testName, 'id' => $albumId];
    }

    protected function makeTestBand()
    {
        $testBandName = 'test'.random_int(1111, 9999);
        factory(App\Band::class, 1)
            ->create(['name' => $testBandName])
            ->each(function (\App\Band $band) {
                $numberOfAlbums = random_int(1, 2);
                while ($numberOfAlbums > 0) {
                    $band->albums()
                         ->save(factory(App\Album::class)->make());
                    $numberOfAlbums--;
                }
            });

        $bandId =
            \App\Band::where('name', '=', $testBandName)->get(['id'])->first()->id;

        return ['name' => $testBandName, 'id' => $bandId];
    }
}
