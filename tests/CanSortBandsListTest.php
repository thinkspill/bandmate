<?php

class CanSortBandsListTest extends AbstractBandMateTestCase
{
    public function testExample()
    {
        $testBand = $this->makeTestBand();
        $name = $testBand['name'];
        $this->visitRoute('bands.index');
        $this->seePageIs('/bands');
        $this->dontSeeText($name);
        $this->click('Id');
        $this->seePageIs('/bands?order=asc&sort=id');
        $this->click('Id');
        $this->seePageIs('/bands?order=desc&sort=id');
        $this->seeText($name);

    }
}
