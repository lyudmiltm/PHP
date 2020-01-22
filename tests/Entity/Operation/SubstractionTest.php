<?php

namespace App\Tests\Entity\Operation;

use App\Entity\Operation\Substraction;
use PHPUnit\Framework\TestCase;

class SubstractionTest extends TestCase
{
    public function testSubstraction() : void {
        $substr = new Substraction();
        $result = $substr->calc(4,5);
        
        $this->assertEquals(-1, $result);
    }
}
