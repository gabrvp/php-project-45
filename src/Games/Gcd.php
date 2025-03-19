<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\executeGameTemplate;

const DESCRIPTION_OF_GAME = 'Find the greatest common divisor of given numbers.'; #Описание игры
const MIN_VALUE = 1; #Минимальное значение для рандомного числа
const MAX_VALUE = 99; #Максимальное значение для рандомного числа

function playGcd(): void
{
    $round = function () {
        $randomNumb1 = rand(MIN_VALUE, MAX_VALUE);
        $randomNumb2 = rand(MIN_VALUE, MAX_VALUE);
        $questionText = "{$randomNumb1} {$randomNumb2}";
        $result = 0;
        while ($randomNumb2 > 0) {
            $result = $randomNumb1 % $randomNumb2;
            $randomNumb1 = $randomNumb2;
            $randomNumb2 = $result;
        }
        $answerCorrect = $randomNumb1;
        return [$questionText, $answerCorrect];
    };
    executeGameTemplate(DESCRIPTION_OF_GAME, $round);
}
