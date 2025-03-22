<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\runGame;

const DESCRIPTION = 'What is the result of the expression?';
const MIN_VALUE = 1;
const MAX_VALUE = 99;
const OPERATIONS = ['+', '-', '*'];

function playCalc(): void
{
    $playRound = function () {
        $randomNumber1 = rand(MIN_VALUE, MAX_VALUE);
        $randomNumber2 = rand(MIN_VALUE, MAX_VALUE);
        $operationKey = array_rand(OPERATIONS, 1);
        $randomOpearation = OPERATIONS[$operationKey];
        $question = "{$randomNumber1} {$randomOpearation} {$randomNumber2}";
        $answer = calculateAnswer($randomNumber1, $randomNumber2, $randomOpearation);
        return [$question, $answer];
    };
    runGame(DESCRIPTION, $playRound);
}

function calculateAnswer(int $randomNumber1, int $randomNumber2, string $randomOpearation): ?int
{
    switch ($randomOpearation) {
        case '+':
            $answer = $randomNumber1 + $randomNumber2;
            return $answer;
        case '-':
            $answer = $randomNumber1 - $randomNumber2;
            return $answer;
        case '*':
            $answer = $randomNumber1 * $randomNumber2;
            return $answer;
        default:
            return null;
    }
}
