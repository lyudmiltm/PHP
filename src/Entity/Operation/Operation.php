<?php

namespace App\Entity\Operation;

interface Operation
{
    public function calc($valueL,$valueR);
}
