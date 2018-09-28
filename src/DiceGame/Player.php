<?php

namespace SpaceLenore\DiceGame;

/**
* Player class, keeps track of the player data.
*/
class Player
{

    // Private variables
    private $score;
    private $name;
    /**
    * Constructor to create a new player
    * @param string name this is the player name
    */
    public function __construct($score = 0, $setName = "player1")
    {
        $this->score = $score;
        $this->name = $setName;
    }

    /**
    * Add score to the private score variable
    * @param int score add this to score.
    * @return void
    */
    public function addScore($score)
    {
        $this->score += $score;
    }

    /**
    * Show the score for the player
    * @return int score
    */
    public function getScore()
    {
        return $this->score;
    }

    /**
    * Show the name of the player
    * @return string name
    */
    public function getName()
    {
        return $this->name;
    }
}
