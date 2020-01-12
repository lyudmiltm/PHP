<?php

namespace App\Entity\Operation;

class Addition implements Operation
{
    public function calc($valueL,$valueR) {
        return $valueL+$valueR;
    }
}
