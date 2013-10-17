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
    $rollIndex = 0;

    for ($frame = 0; $frame<10; $frame++) {

      $frameScore = 0;
      $bonus = 0;
      if ($this->isStrike($rollIndex)) {
       
        $bonus = $this->bonusStrike($rollIndex);
        $frameScore += $this->rolls[$rollIndex]; 
      
      } else {

        if ($this->isSpare($rollIndex)) {
          $bonus = $this->bonusSpare($rollIndex);
        }

        $frameScore += $this->rolls[$rollIndex];
        $frameScore += $this->rolls[++$rollIndex];

      }
  
      $score += $frameScore + $bonus;
      $rollIndex++;
    }

    return $score;

  }

  private function isStrike($frame)
  {
    return ($this->rolls[$frame] == 10);
  }

  private function isSpare($frame)
  {
    return (($this->rolls[$frame] + $this->rolls[$frame+1]) == 10);
  }

  private function bonusStrike($frame)
  {
    return $this->rolls[$frame+1] + $this->rolls[$frame+2];
  }

  private function bonusSpare($frame)
  {
    return $this->rolls[$frame+2];
  }
}

