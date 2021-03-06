<?php

namespace SpaceLenore\DiceGame;

/**
* Dice class, a dice that can be rolled.
*/
class Dice
{

    // private $result;
    private $sides;
    private $lastRoll;

    /**
    * Dice Constructor
    *
    * @param int sides on the dice.
    */
    public function __construct($sides = 6)
    {
        $this->sides = $sides;
    }


    /**
    * Rolls the dice
    *
    * @return int
    */
    public function roll()
    {
        $this->lastRoll = rand(1, $this->sides);
        return $this->lastRoll;
    }

    /**
    * Returns the int from the latest roll
    *
    * @return int
    */
    public function getLastRoll()
    {
        return $this->lastRoll;
    }
}
