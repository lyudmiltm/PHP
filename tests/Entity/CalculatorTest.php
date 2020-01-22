<?php

namespace App\Tests\Entity;

use App\Entity\Calculator;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    public function testCalculatorValid() : void {
        $calc = new Calculator();
        $result = $calc->eval('2*2+3*3-1*4/2');
        
        $this->assertEquals(11, $result);
    }
    
    public function testCalculatorInvalid() : void {
        $calc = new Calculator();
        $result = $calc->eval('2*2+3*3-1*4/2+');
        
        $this->assertEquals(null, $result);
    }
}
