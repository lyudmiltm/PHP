<?php

namespace App\Entity\Operation;

class Substraction implements Operation
{
    public function calc(float $valueL, float $valueR) : float {
        return $valueL-$valueR;
    }
}
