<?php
/* Unit test: vendor/bin/phpunit src/tests */
require_once __DIR__ . '/vendor/autoload.php'; // Если используется Composer

use App\Evaluator;
use App\Parser;


function main(array $argc): void
{
    if (count($argc) < 2) {
        echo "Использование: php app.php <выражение>\n";
        echo "Введите выражение (например, (* (+ 1 3) 2)): ";
        $input = fgets(STDIN);
    } else {
        $input = $argc[1];
    }

    try {
        $parsed = Parser::parseExpression($input);
        $result = Evaluator::evaluate($parsed);
        echo "Пример: $input\n";
        echo "Результат: $result\n";
    } catch (\Exception $e) {
        echo "Ошибка: " . $e->getMessage() . "\n";
    }
}

main($argv);