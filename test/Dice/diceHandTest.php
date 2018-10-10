<?php

namespace SpaceLenore\DiceGame;

use PHPUnit\Framework\TestCase;

class DiceHandTest extends TestCase
{
    public function testDiceHandClass()
    {
        $tmpDiceHand = new DiceHand();
        $this->assertInstanceOf("\SpaceLenore\DiceGame\DiceHand", $tmpDiceHand);
    }

    public function testRollAndFetchDiceHand()
    {
        $tmpDiceHand = new DiceHand();
        $tmpDiceHand->roll();
        $this->assertInternalType("array", $tmpDiceHand->values());
    }
}
