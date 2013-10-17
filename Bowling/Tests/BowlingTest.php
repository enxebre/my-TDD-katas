<?php

require_once dirname(__FILE__) . '/../Game.php';
Class BowlingTest extends PHPUnit_Framework_TestCase
{
  function setUp()
  {
    $this->game = new Game();
  }

  function pinsPerRollCalcualtor($pins, $rollsNumber) {
    $game = $this->game;
    for ($i = 1; $i <= $rollsNumber; $i++) {
      $game->roll($pins);
    }
  }  

  function testGutterGame() {
    $game = $this->game;
    for ($i = 0; $i < 20; $i++) {
      $game->roll(0);
    }
    $this->assertEquals(0, $game->score());
  }

  function testAllOne() {
    $this->pinsPerRollCalcualtor(1, 20);
    $this->assertEquals(20, $this->game->score());
  }

  function testOneSpare() {
    $this->pinsPerRollCalcualtor(2, 1);
    $this->pinsPerRollCalcualtor(8, 1);
    $this->pinsPerRollCalcualtor(1, 1);
    $this->pinsPerRollCalcualtor(1, 1);
    $this->pinsPerRollCalcualtor(0, 16);

    $this->assertEquals(13, $this->game->score());    
  }

  function testOneStrike() {
    $this->pinsPerRollCalcualtor(10,1);  
    $this->pinsPerRollCalcualtor(3,1);
    $this->pinsPerRollCalcualtor(4,17);

    $this->assertEquals($this->game->score(), 88);

  } 
}
