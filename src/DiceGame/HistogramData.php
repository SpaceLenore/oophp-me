<?php

namespace SpaceLenore\DiceGame;

/**
 * A dice which has the ability to present data to be used for creating
 * a histogram.
 */
class HistogramData extends Dice implements HistogramInterface
{
    use HistogramTrait;

    /**
     * Roll the dice, remember its value in the serie and return
     * its value.
     *
     * @return int the value of the rolled dice.
     */
    public function roll()
    {
        $thaRoll =  parent::roll();
        array_push($this->serie, $thaRoll);
        return $this->getLastRoll();
    }

    public function getMin()
    {
        return $this->getHistogramMin();
    }

    public function getMax()
    {
        return $this->getHistogramMax();
    }

    public function getSerie()
    {
        return $this->getHistogramSerie();
    }
}
