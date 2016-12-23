<?php

class CanListAllAlbumsTest extends AbstractBandMateTestCase
{
    public function testCanListAllAlbums()
    {
        $testBand = $this->makeTestBand();
        $this->visit('/albums?order=desc&sort=id');
        $this->seeText($testBand['name']);
    }
}
