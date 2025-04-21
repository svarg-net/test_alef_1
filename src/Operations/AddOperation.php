<?php

namespace App\Operations;

class AddOperation implements Operation
{
    public function execute(array $operands): float
    {
        return array_sum($operands);
    }
}