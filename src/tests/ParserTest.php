<?php

namespace App\Tests;

use App\Evaluator;
use App\Parser;
use PHPUnit\Framework\TestCase;

class ParserTest extends TestCase {
    public function testExpressions(): void {
        $examples = Examples::getExamples();

        foreach ($examples as [$input, $expected]) {
            try {
                $parsed = Parser::parseExpression($input);
                $result = Evaluator::evaluate($parsed);
                $this->assertEquals(
                    $expected,
                    $result,
                    "Ошибка ввода: $input"
                );
            } catch (\Exception $e) {
                $this->fail("Исключение при вводе: $input. Сообщение: " . $e->getMessage());
            }
        }
    }

    public function testErrorHandling(): void {
        $invalidInputs = [
            "(/ 10 0)", // Деление на ноль
            "(+ 1 a)",  // Некорректный символ
            "((+ 1 2)", // Не закрытая скобка
        ];

        foreach ($invalidInputs as $input) {
            $this->expectException(\Exception::class);
            $parsed = Parser::parseExpression($input);
            Evaluator::evaluate($parsed);
        }
    }
}