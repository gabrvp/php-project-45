<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\executeGameTemplate;
use function cli\line;
use function cli\prompt;

const DESCRIPTION_OF_GAME = 'What is the result of the expression?';
const MIN_VALUE = 1; #Минимальное значение для рандомного числа
const MAX_VALUE = 99; #Максимальное значение для рандомного числа
const ARRAY_OPERATIONS = ['+', '-', '*']; #Массив с возможными операторами

function playCalc(): void
{
    $round = function () {
        $randomNumb1 = rand(MIN_VALUE, MAX_VALUE);
        $randomNumb2 = rand(MIN_VALUE, MAX_VALUE);
        $operationKey = array_rand(ARRAY_OPERATIONS, 1);
        $randomOpearation = ARRAY_OPERATIONS[$operationKey];
        $expressionString = "{$randomNumb1} {$randomOpearation} {$randomNumb2}";
        line("Question: {$expressionString}");
        $answerOfUser = (int) prompt('Your answer');
        switch ($randomOpearation) {
            case '+':
                $answerCorrect = $randomNumb1 + $randomNumb2;
                break;
            case '-':
                $answerCorrect = $randomNumb1 - $randomNumb2;
                break;
            case '*':
                $answerCorrect = $randomNumb1 * $randomNumb2;
                break;
        }
        return [$answerOfUser, $answerCorrect];
    };
    executeGameTemplate(DESCRIPTION_OF_GAME, $round);
}
