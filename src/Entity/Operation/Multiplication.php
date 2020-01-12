<?php

namespace App\Entity\Operation;

class Multiplication implements Operation
{
    public function calc($valueL,$valueR) {
        return $valueL*$valueR;
    }
}
