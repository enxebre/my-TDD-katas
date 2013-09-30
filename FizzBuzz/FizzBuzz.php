<?php

Class FizzBuzz
{
  function __construct()
  {
    
  }

  public function calculate($value)
  {
    if (!is_int($value)) {
      throw new InvalidArgumentException('It is not an integer');
    }

    $result = '';
    if ($value % 3 == 0) {
      $result .= 'fizz';      
    }

    if ($value % 5 == 0) {
      $result .= 'buzz';      
    }

    return !empty($result) ? $result : $value;
  }
  
}
