<?php

namespace App;

use App\Operations\Operation;

class Evaluator
{
    public static function evaluate($expression)
    {
        if (is_numeric($expression)) {
            return (float)$expression;
        }

        if (is_array($expression)) {
            $operationName = array_shift($expression);
            $operands = array_map([Evaluator::class, 'evaluate'], $expression);

            if ($operationName === '-' && count($operands) === 1) {
                return -$operands[0];
            }

            $operation = OperationFactory::create($operationName);
            return $operation->execute($operands);
        }

        throw new \Exception("Ошибка в выражении");
    }
}