<?php
use PHPUnit\Framework\TestCase;
require '../calaculator.php';

class CalculatorTest extends TestCase{
    public function testAdd(){
        $calc = new Calculator();
        $this->assertEquals(5, $calc->add(2,3));
       
    }
    public function testSubtract(){
        $calc = new Calculator();
        $this->assertEquals(1, $calc->subtract(5,4));
    }
    public function testMultiply(){
        $calc = new Calculator();
        $this->assertEquals(12, $calc->multiply(3,4));
    }
    public function testDivide(){
        $calc = new Calculator();
        $this->assertEquals(1.5, $calc->divide(6,3));
    }
}

?>