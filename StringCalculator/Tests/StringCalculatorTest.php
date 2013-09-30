<?php
require_once dirname(__FILE__) . '/../StringCalculator.php';
Class StringCalculatorTest extends PHPUnit_Framework_TestCase
{
  private $stringCalculator;
  function setUp()
  {
    $this->stringCalculator = new StringCalculator();
  }

  public function testStringCalculatorEmptyValue($string = "3,2,4,5", $valueExpected = 14)
  {
        $this->assertEquals($valueExpected, $this->stringCalculator->add($string));
  }

  public function testStringCalculatorOneValue($string = "3", $valueExpected = 3)
  {
    $this->assertEquals($valueExpected, $this->stringCalculator->add($string));
  }

  public function testStringCalculatorTwoValue($string = "3,2", $valueExpected = 5)
  {
    $this->assertEquals($valueExpected, $this->stringCalculator->add($string));
  }

  public function testStringCalculatorWithLinebreaks($string = "3\n3,4", $valueExpected = 10)
  {
    $this->assertEquals($valueExpected, $this->stringCalculator->add($string));
  }
}
