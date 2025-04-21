<?php

namespace App\Operations;

interface Operation
{
    public function execute(array $operands): float;
}