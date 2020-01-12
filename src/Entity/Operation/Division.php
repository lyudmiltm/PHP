<?php

namespace App\Entity\Operation;

class Division implements Operation
{
    public function calc($valueL,$valueR) {
        if($valueR == 0) {
            return 0;
        }
        return $valueL/$valueR;
    }
}
