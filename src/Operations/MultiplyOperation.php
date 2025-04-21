<?php

namespace App\Operations;

class MultiplyOperation implements Operation
{
    public function execute(array $operands): float
    {
        return array_product($operands);
    }
}