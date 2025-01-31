<?php 
use PHPUnit\Framework\TestCase;

require_once 'Calculator.php';

class CalculatorTest extends TestCase {
    public function testAdd() {
        $calc = new Calculator();
        $this->assertEquals(10, $calc->add(5, 5));
    }

    public function testSubtract() {
        $calc = new Calculator();
        $this->assertEquals(0, $calc->subtract(5, 5));
    }
    public function testMultiply() {
        $calc = new Calculator();
        $this->assertEquals(25, $calc->multiply(5, 5));
    }
    public function testDivide() {
        $calc = new Calculator();
        $this->assertEquals(1, $calc->divide(5, 5));
    }
}


?>