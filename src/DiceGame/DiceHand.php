<?php

namespace SpaceLenore\DiceGame;

/**
* Dice hand, will roll dices that are in the hand
*/
class DiceHand
{

    //private variables
    private $dices;
    private $values;

    /**
    * Constructor to initiate the dicehand with a number of dices.
    *
    * @param int $dices Number of dices to create, defaults to five.
    */
    public function __construct($dices = 1)
    {
        $this->dices = [];
        $this->values = [];

        for ($i = 0; $i < $dices; $i++) {
            $this->dices[]  = new   Dice();
        }
    }

    /**
     * Roll all dices save their value.
     *
     * @return void.
     */
    public function roll()
    {
        foreach ($this->dices as $aDice) {
            array_push($this->values, $aDice->roll());
        }
    }

    /**
     * Get values of dices from last roll.
     *
     * @return array with values of the last roll.
     */
    public function values()
    {
        return $this->values;
    }
}
