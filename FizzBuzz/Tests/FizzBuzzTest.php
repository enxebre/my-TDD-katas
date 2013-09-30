<?php

require_once dirname(__FILE__) . '/../FizzBuzz.php';

Class FizzBuzzTest extends PHPUnit_Framework_TestCase 
{
  private $fizzBuzz;

  public function setUp()
  {
    $this->fizzBuzz = new FizzBuzz();
  }

  public function testFizzBuzzValueOne()
  {
    $value = $this->fizzBuzz->calculate(1);
    $this->assertEquals(1, $value);
  }

  public function testFizzBuzzValueTwo()
  {
    $value = $this->fizzBuzz->calculate(2);
    $this->assertEquals(2, $value);
  }

  public function testFizzMultipleThree()
  {
    $numbers = array(3, 6, 9, 12);
    foreach ($numbers as $key => $value) {
      $result = $this->fizzBuzz->calculate($value);
      $this->assertEquals('fizz', $result);
    }
  }

  public function testFizzMultipleFive()
  {
    $numbers = array(5, 10, 20, 25);
    foreach ($numbers as $key => $value) {
      $result = $this->fizzBuzz->calculate($value);
      $this->assertEquals('buzz', $result);
    }
  }

  public function testFizzMultipleFifteen()
  {
    $numbers = array(15, 45, 135);
    foreach ($numbers as $key => $value) {
      $result = $this->fizzBuzz->calculate($value);
      $this->assertEquals('fizzbuzz', $result);
    }
  }

  public function testFizzAllOptionsInOne()
  {
    $numbers = array(15, 3, 5, 4);
    $result = '';
    foreach ($numbers as $key => $value) {
      $result .= $this->fizzBuzz->calculate($value);
    }

    $this->assertEquals('fizzbuzzfizzbuzz4', $result);
  }

  /**
   * @expectedException InvalidArgumentException
   */
  public function testInvalidArgument() {
    $this->fizzBuzz->calculate('a');
  }

}