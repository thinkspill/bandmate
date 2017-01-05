<?php

class CanEditAlbumTest extends AbstractBandMateTestCase
{
    public function testEditAlbum()
    {
        $testAlbum = $this->makeTestAlbum();
        $newAlbumName = 'newtest'.random_int(1111, 9999);
        $name = $testAlbum['name'];
        $id = $testAlbum['id'];
        $this->visitRoute('albums.index');
        $this->click('Id');
        $this->seePageIs('/albums?order=asc&sort=id');
        $this->click('Id');
        $this->seePageIs('/albums?order=desc&sort=id');
        $this->seeText($name);
        $this->click('edit_album_'.$id);
        $this->seeRouteIs('albums.edit', [$id]);
        $this->see($name);
        $this->type('', 'name');
        $this->press('Save');
        $this->seeRouteIs('albums.edit', [$id]);
        $this->seeText('name field is required');
        $this->type($newAlbumName, 'name');
        $this->press('Save');
        $this->seeRouteIs('albums.index');
        $this->seeText('Updated '.$newAlbumName);
    }
}
