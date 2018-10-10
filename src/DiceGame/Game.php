<?php

namespace SpaceLenore\DiceGame;

/**
* Game class, plays the game
*/
class Game
{

    //private variables
    private $dices;
    private $player;
    private $aiPlayer;
    public $yourTurn;

    /**
    * Constructor that starts the game
    * @return void
    */
    public function __construct($playerScore = 0, $aiScore = 0)
    {
        $this->dices = new \SpaceLenore\DiceGame\DiceHistogram();
        $this->player = new \SpaceLenore\DiceGame\Player($playerScore, "Dave");
        $this->aiPlayer = new \SpaceLenore\DiceGame\Player($aiScore, "hal2000");
        $this->yourTurn = true;
    }

    /**
    * Get the player data
    * @return object $this->player
    */
    public function getPlayer()
    {
        return $this->player;
    }

    /**
    * Get the AI data
    * @return object $this->ai
    */
    public function getAI()
    {
        return $this->aiPlayer;
    }

    public function switchTurn()
    {
        $this->yourTurn = !$this->yourTurn;
    }

    public function rollDices()
    {
        //roll dices
        $aRoll = $this->dices->roll();
        // $dr = $this->dices->values()[0];
        return $aRoll == 1 ? -1 : $aRoll;
    }

    public function aiTurn($currentTmpScore = 0)
    {
        while ($currentTmpScore <= 10) {
            $thisRoll = $this->rollDices();
            if ($thisRoll == 1 || $currentTmpScore == -1) {
                $currentTmpScore = 0;
                break;
            } else {
                $currentTmpScore += $thisRoll;
            }
        }
        return $currentTmpScore;
    }

    public function getHistogram(int $min = null, int $max = null)
    {
        return $this->dices->printHistogram($min, $max);
    }
}
