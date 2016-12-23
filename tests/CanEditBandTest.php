<?php

class CanEditBandTest extends AbstractBandMateTestCase
{
    public function testEditBand()
    {
        $testBand = $this->makeTestBand();
        $newBandName = 'newtest'.random_int(1111,9999);
        $name = $testBand['name'];
        $id = $testBand['id'];
        $this->visit('/bands?order=desc&sort=id');
        $this->seeText($name);
        $this->click('edit_band_'.$id);
        $this->seeRouteIs('bands.edit', [$id]);
        $this->see($name);
        $this->type('', 'name');
        $this->press('Save');
        $this->seeRouteIs('bands.edit', [$id]);
        $this->seeText('name field is required');
        $this->type($newBandName, 'name');
        $this->press('Save');
        $this->seePageIs('/');
        $this->seeText('Updated '.$newBandName);
    }
}
