<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\executeGameTemplate;
use function cli\line;
use function cli\prompt;

const DESCRIPTION_OF_GAME = 'Find the greatest common divisor of given numbers.'; #Описание игры
const MIN_VALUE = 1; #Минимальное значение для рандомного числа
const MAX_VALUE = 99; #Максимальное значение для рандомного числа

function playGcd(): void
{
    $round = function () {
        $randomNumb1 = rand(MIN_VALUE, MAX_VALUE);
        $randomNumb2 = rand(MIN_VALUE, MAX_VALUE);
        line("Question: {$randomNumb1} {$randomNumb2}");
        $answerOfUser = (int) prompt('Your answer');
        $result = 0;
        while ($randomNumb2 > 0) {
            $result = $randomNumb1 % $randomNumb2;
            $randomNumb1 = $randomNumb2;
            $randomNumb2 = $result;
        }
        $answerCorrect = $randomNumb1;
        return [$answerOfUser, $answerCorrect];
    };
    executeGameTemplate(DESCRIPTION_OF_GAME, $round);
}
