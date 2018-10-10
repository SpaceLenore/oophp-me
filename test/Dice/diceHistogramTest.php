<?php

namespace SpaceLenore\DiceGame;

use PHPUnit\Framework\TestCase;

class DiceHistogramTest extends TestCase
{

    public function testGetHistogram()
    {
        $tmpGame = new Game();
        $expHistogramString ='1: <br>2: <br>3: <br>4: <br>5: <br>6: <br>';
        $this->assertEquals($expHistogramString, $tmpGame->getHistogram());
    }

    public function testGetHistogramWithLimits()
    {
        $tmpGame = new Game();
        $expHistogramString ='1: <br>2: <br>3: <br>4: <br>5: <br>6: <br>';
        $this->assertEquals($expHistogramString, $tmpGame->getHistogram(1, 6));
    }

    public function testHistogramAddRollToHistogram()
    {
        $tmpGame = new Game();
        $tmpGame->rollDices();
        $this->assertInternalType("string", $tmpGame->getHistogram());
    }

    public function testHistogramAddRollToLimitedHistogram()
    {
        $tmpGame = new Game();
        $tmpGame->rollDices();
        $this->assertInternalType("string", $tmpGame->getHistogram(1, 6));
    }

    public function testGetHistogramSerie()
    {
        $tmpData = new HistogramData();
        $tmpData->roll();
        $this->assertInternalType("array", $tmpData->getSerie());
    }

    public function testGetHistogramMin()
    {
        $tmpData = new HistogramData();
        $tmpData->roll();
        $this->assertInternalType("int", $tmpData->getMin());
    }

    public function testGetHistogramMax()
    {
        $tmpData = new HistogramData();
        $tmpData->roll();
        $this->assertInternalType("int", $tmpData->getMax());
    }
}
