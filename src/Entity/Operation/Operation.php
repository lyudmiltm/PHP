<?php

namespace App\Entity\Operation;

interface Operation
{
    public function calc(float $valueL, float $valueR) : float;
}
