<?php

namespace App;

use Exception;

final class Parser
{
    public static function parseExpression($input)
    {
        $input = trim($input);
        if (is_numeric($input)) {
            return (float)$input;
        }
        if (preg_match('/^\((.*)\)$/', $input, $matches)) {
            $content = $matches[1];
            $tokens = [];
            $currentToken = '';
            $depth = 0;
            for ($i = 0; $i < strlen($content); $i++) {
                $char = $content[$i];

                if ($char === '(') {
                    $depth++;
                } elseif ($char === ')') {
                    $depth--;
                }

                if ($char === ' ' && $depth === 0) {
                    if ($currentToken !== '') {
                        $tokens[] = $currentToken;
                        $currentToken = '';
                    }
                } else {
                    $currentToken .= $char;
                }
            }

            if ($currentToken !== '') {
                $tokens[] = $currentToken;
            }

            $operation = array_shift($tokens);
            $args = array_map([Parser::class, 'parseExpression'], $tokens);

            return [$operation, ...$args];
        }

        throw new Exception("Invalid expression: $input");
    }
}