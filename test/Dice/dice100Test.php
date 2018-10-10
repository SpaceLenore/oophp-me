<?php

namespace SpaceLenore\DiceGame;

use PHPUnit\Framework\TestCase;

class DiceTest extends TestCase
{
    public function testGameInstance()
    {
        $tmpGame = new Game();
        $this->assertInstanceOf("\SpaceLenore\DiceGame\Game", $tmpGame);
    }

    public function testGetPlayer()
    {
        $tmpGame = new Game();
        $this->assertInstanceOf("\SpaceLenore\DiceGame\Player", $tmpGame->getPlayer());
    }

    public function testGetAI()
    {
        $tmpGame = new Game();
        $this->assertInstanceOf("\SpaceLenore\DiceGame\Player", $tmpGame->getAI());
    }

    public function testSwitchTurn()
    {
        $tmpGame = new Game();

        $this->assertEquals($tmpGame->switchTurn(), false);
    }

    public function testRollDices()
    {
        $tmpGame = new Game();

        $this->assertInternalType("int", $tmpGame->rollDices());
    }

    public function testAiTurnLoss()
    {
        $tmpGame = new Game();

        $this->assertInternalType("int", $tmpGame->aiTurn(-1));
    }

    public function testAiTurnRoll()
    {
        $tmpGame = new Game();

        $this->assertInternalType("int", $tmpGame->aiTurn());
    }

    public function testPlayerGetName()
    {
        $tmpPlayer = new Player(0, "John");

        $this->assertEquals("John", $tmpPlayer->getName());
    }

    public function testPlayerGetScore()
    {
        $tmpPlayer = new Player(42);

        $this->assertEquals(42, $tmpPlayer->getScore());
    }

    public function testPlayerAddScore()
    {
        $tmpPlayer = new Player(42);
        $tmpPlayer->addScore(1);
        $this->assertEquals(43, $tmpPlayer->getScore());
    }
}
