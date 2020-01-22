<?php

namespace App\Tests\Entity\Operation;

use App\Entity\Operation\Addition;
use PHPUnit\Framework\TestCase;

class AdditionTest extends TestCase
{
    public function testAddition() : void {
        $add = new Addition();
        $result = $add->calc(4,5);
        
        $this->assertEquals(9, $result);
    }
}
