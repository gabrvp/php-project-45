<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\executeGameTemplate;

const DESCRIPTION_OF_GAME = 'Find the greatest common divisor of given numbers.'; #Описание игры
const MIN_VALUE = 1; #Минимальное значение для рандомного числа
const MAX_VALUE = 99; #Максимальное значение для рандомного числа

function playGcd(): void
{
    $playRound = function () {
        $randomNumber1 = rand(MIN_VALUE, MAX_VALUE);
        $randomNumber2 = rand(MIN_VALUE, MAX_VALUE);
        $questionText = "{$randomNumber1} {$randomNumber2}";
        [$randomNumber1] = searchGcd($randomNumber1, $randomNumber2);
        $answerCorrect = $randomNumber1;
        return [$questionText, $answerCorrect];
    };
    executeGameTemplate(DESCRIPTION_OF_GAME, $playRound);
}

function searchGcd(int $randomNumber1, int $randomNumber2)
{
    while ($randomNumber2 > 0) {
        $result = 0;
        $result = $randomNumber1 % $randomNumber2;
        $randomNumber1 = $randomNumber2;
        $randomNumber2 = $result;
    }
    return [$randomNumber1];
}
