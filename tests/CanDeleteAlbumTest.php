<?php

class CanDeleteAlbumTest extends AbstractBandMateTestCase
{
    public function testDeleteAlbum()
    {
        $testAlbum = $this->makeTestAlbum();
        $name = $testAlbum['name'];
        $id = $testAlbum['id'];
        $this->visit('/albums?order=desc&sort=id');
        $this->seeText($name);
        $this->seeElement('#album_id_'.$id.' input[value="Delete"]');
        $this->press('Delete');
        $this->seeRouteIs('albums.index');
        $this->see('Deleted '.$name);
        $this->dontSeeElement('#album_id_'.$id);
    }
}
