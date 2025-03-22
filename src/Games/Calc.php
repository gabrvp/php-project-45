<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\executeGameTemplate;

const DESCRIPTION_OF_GAME = 'What is the result of the expression?';
const MIN_VALUE = 1;
const MAX_VALUE = 99;
const ARRAY_OPERATIONS = ['+', '-', '*'];

function playCalc(): void
{
    $playRound = function () {
        $randomNumber1 = rand(MIN_VALUE, MAX_VALUE);
        $randomNumber2 = rand(MIN_VALUE, MAX_VALUE);
        $operationKey = array_rand(ARRAY_OPERATIONS, 1);
        $randomOpearation = ARRAY_OPERATIONS[$operationKey];
        $questionText = "{$randomNumber1} {$randomOpearation} {$randomNumber2}";
        $answerCorrect = calculateAnswerCorrect($randomNumber1, $randomNumber2, $randomOpearation);
        return [$questionText, $answerCorrect];
    };
    executeGameTemplate(DESCRIPTION_OF_GAME, $playRound);
}

function calculateAnswerCorrect($randomNumber1, $randomNumber2, $randomOpearation): ?int
{
    switch ($randomOpearation) {
        case '+':
            $answerCorrect = $randomNumber1 + $randomNumber2;
            return $answerCorrect;
        case '-':
            $answerCorrect = $randomNumber1 - $randomNumber2;
            return $answerCorrect;
        case '*':
            $answerCorrect = $randomNumber1 * $randomNumber2;
            return $answerCorrect;
        default:
            return null;
    }
}
