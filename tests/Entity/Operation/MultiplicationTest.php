<?php

namespace App\Tests\Entity\Operation;

use App\Entity\Operation\Multiplication;
use PHPUnit\Framework\TestCase;

class MultiplicationTest extends TestCase
{
    public function testMultiplication() : void {
        $multiply = new Multiplication();
        $result = $multiply->calc(4,5);
        
        $this->assertEquals(20, $result);
    }
}
