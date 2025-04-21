<?php

namespace App;

use App\Operations\AddOperation;
use App\Operations\SubtractOperation;
use App\Operations\MultiplyOperation;
use App\Operations\DivideOperation;
use App\Operations\Operation;

class OperationFactory
{
    public static function create(string $operationName): Operation
    {
        switch ($operationName) {
            case '+':
                return new AddOperation();
            case '-':
                return new SubtractOperation();
            case '*':
                return new MultiplyOperation();
            case '/':
                return new DivideOperation();
            default:
                throw new \Exception("Неизвестная операция: $operationName");
        }
    }
}