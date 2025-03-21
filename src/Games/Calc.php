<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\executeGameTemplate;

const DESCRIPTION_OF_GAME = 'What is the result of the expression?';
const MIN_VALUE = 1; #Минимальное значение для рандомного числа
const MAX_VALUE = 99; #Максимальное значение для рандомного числа
const ARRAY_OPERATIONS = ['+', '-', '*']; #Массив с возможными операторами

function playCalc(): void
{
    $playRound = function (){
        $randomNumber1 = rand(MIN_VALUE, MAX_VALUE);
        $randomNumber2 = rand(MIN_VALUE, MAX_VALUE);
        $operationKey = array_rand(ARRAY_OPERATIONS, 1);
        $randomOpearation = ARRAY_OPERATIONS[$operationKey];
        $questionText = "{$randomNumber1} {$randomOpearation} {$randomNumber2}";
        switch ($randomOpearation) {
            case '+':
                $answerCorrect = $randomNumber1 + $randomNumber2;
                break;
            case '-':
                $answerCorrect = $randomNumber1 - $randomNumber2;
                break;
            case '*':
                $answerCorrect = $randomNumber1 * $randomNumber2;
                break;
            default:
                return null;
        }
        return [$questionText, $answerCorrect];
    };
    executeGameTemplate(DESCRIPTION_OF_GAME, $playRound);
}
