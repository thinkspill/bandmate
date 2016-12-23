<?php

class CanFilterAllAlbumsListTest extends AbstractBandMateTestCase
{
    private $bandPath = '/bands/';

    public function testFilterAlbumsByBand()
    {
        $testBand1 = $this->makeTestBand();
        $testBand2 = $this->makeTestBand();

        $this->visit('/albums?order=desc&sort=id');
        $this->seeBothBands($testBand1['name'], $testBand2['name']);

        $this->selectBandId($testBand1['id']);
        $this->seeOnlyBand($testBand1['name'], $testBand2['name']);

        $this->selectBandId($testBand2['id']);
        $this->seeOnlyBand($testBand2['name'], $testBand1['name']);
    }

    /**
     * @param $firstBand
     * @param $secondBand
     */
    private function seeBothBands($firstBand, $secondBand)
    {
        $this->see($this->bandPath.$firstBand);
        $this->see($this->bandPath.$secondBand);
    }

    /**
     * @param $visibleBand
     * @param $hiddenBand
     */
    private function seeOnlyBand($visibleBand, $hiddenBand)
    {
        $this->see($this->bandPath.$visibleBand);
        $this->dontSee($this->bandPath.$hiddenBand);
    }

    /**
     * @param $id
     */
    private function selectBandId($id)
    {
        $this->select($id, 'band');
        $this->press('Filter');
    }
}
