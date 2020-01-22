<?php

namespace App\Entity\Operation;

class Division implements Operation
{
    public function calc(float $valueL, float $valueR) : float {
        if($valueR == 0) {
            return 0.0;
        }
        return $valueL/$valueR;
    }
}
