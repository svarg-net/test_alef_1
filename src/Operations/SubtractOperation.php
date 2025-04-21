<?php

namespace App\Operations;

class SubtractOperation implements Operation
{
    public function execute(array $operands): float
    {
        return array_shift($operands) - array_sum($operands);
    }
}