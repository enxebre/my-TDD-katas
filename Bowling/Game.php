<?php

Class Game
{
  private $rolls = array();
  private $currentRoll = 0;

  function __constructor()
  {

  }

  public function roll($pins)
  {
    $this->rolls[$this->currentRoll] = $pins;
    $this->currentRoll++;
  }

  public function score()
  {
    $score = 0;
    $rollNumber = 0;

    for ($frame = 0; $frame<10; $frame++) {

      $frameScore = 0;
      $frameScore += $this->rolls[$rollNumber];
      $frameScore += $this->rolls[++$rollNumber];  

      $bonusSpare = $frameScore == 10 ? $this->rolls[$rollNumber+1] : 0; 

      $score += $frameScore + $bonusSpare;

      $rollNumber++;
    }

    return $score;

  }
}


