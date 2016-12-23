<?php

class CanListAllBandsTest extends AbstractBandMateTestCase
{
    public function testExample()
    {
        $testBand = $this->makeTestBand();
        $this->visit('/bands?order=desc&sort=id');
        $this->seeText($testBand['name']);

    }
}
