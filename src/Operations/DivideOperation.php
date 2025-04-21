<?php

namespace App\Operations;

class DivideOperation implements Operation
{
    public function execute(array $operands): float
    {
        $result = array_shift($operands);
        foreach ($operands as $operand) {
            if ($operand == 0) {
                throw new \Exception("Деление на ноль");
            }
            $result /= $operand;
        }
        return $result;
    }
}