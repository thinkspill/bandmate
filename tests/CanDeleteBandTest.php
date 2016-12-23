<?php

class CanDeleteBandTest extends AbstractBandMateTestCase
{
    public function testDeleteBand()
    {
        $testBand = $this->makeTestBand();
        $this->visit('/bands?order=desc&sort=id');
        $this->seeText($testBand['name']);
        $this->seeElement('#band_id_'.$testBand['id'].' input[value="Delete"]');
        $this->press('Delete');
        $this->seeRouteIs('bands.index');
        $this->see('Deleted '.$testBand['name']);
        $this->dontSeeElement('#band_id_'.$testBand['id']);
    }
}
