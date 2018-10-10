<?php

namespace SpaceLenore\DiceGame;

use PHPUnit\Framework\TestCase;

class OtherDiceTest extends TestCase
{
    public function testGetLastRoll()
    {
        $tmpDice = new Dice();

        $this->assertEquals(null, $tmpDice->getLastRoll());
    }
}
