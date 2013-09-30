<?php

Class StringCalculator
{
  function __construct() 
  {
    
  }

  public function add($string)
  {
    $string = str_replace("\n", ",", $string);
    $numbers = explode(',', $string);

    $sum = 0;
    foreach ($numbers as $key => $value) {
      $sum += (int) $value;
    }
    return $sum;
  }
}