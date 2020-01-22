<?php

namespace App\Entity\Operation;

class Addition implements Operation
{
    public function calc(float $valueL, float $valueR) : float {
        return $valueL+$valueR;
    }
}
