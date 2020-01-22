<?php

namespace App\Entity\Operation;

class Multiplication implements Operation
{
    public function calc(float $valueL, float $valueR) : float {
        return $valueL*$valueR;
    }
}
