<?php

namespace App\Entity\Operation;

class Substraction implements Operation
{
    public function calc($valueL,$valueR) {
        return $valueL-$valueR;
    }
}
