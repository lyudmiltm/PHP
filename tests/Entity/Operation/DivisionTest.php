<?php

namespace App\Tests\Entity\Operation;

use App\Entity\Operation\Division;
use PHPUnit\Framework\TestCase;

class DivisionTest extends TestCase
{
    public function testDivisionNonzero() : void {
        $div = new Division();
        $result = $div->calc(4,5);
        
        $this->assertEquals(0.8, $result);
    }
    
    public function testDivisionZero() : void {
        $div = new Division();
        $result = $div->calc(4,0);
        
        $this->assertEquals(0, $result);
    }
}
