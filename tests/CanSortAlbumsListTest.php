<?php

class CanSortAlbumsListTest extends AbstractBandMateTestCase
{
    public function testExample()
    {
        $testAlbum = $this->makeTestAlbum();
        $name = $testAlbum['name'];
        $this->visitRoute('albums.index');
        $this->seePageIs('/albums');
        $this->dontSeeText($name);
        $this->click('Id');
        $this->seePageIs('/albums?order=asc&sort=id');
        $this->click('Id');
        $this->seePageIs('/albums?order=desc&sort=id');
        $this->seeText($name);

    }
}
