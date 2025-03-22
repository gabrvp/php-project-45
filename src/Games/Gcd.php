<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\runGame;

const DESCRIPTION = 'Find the greatest common divisor of given numbers.';
const MIN_VALUE = 1;
const MAX_VALUE = 99;

function playGcd(): void
{
    $playRound = function () {
        $randomNumber1 = rand(MIN_VALUE, MAX_VALUE);
        $randomNumber2 = rand(MIN_VALUE, MAX_VALUE);
        $question = "{$randomNumber1} {$randomNumber2}";
        $randomNumber1 = searchGcd($randomNumber1, $randomNumber2);
        $answer = $randomNumber1;
        return [$question, $answer];
    };
    runGame(DESCRIPTION, $playRound);
}

function searchGcd(int $randomNumber1, int $randomNumber2): int
{
    while ($randomNumber2 > 0) {
        $result = 0;
        $result = $randomNumber1 % $randomNumber2;
        $randomNumber1 = $randomNumber2;
        $randomNumber2 = $result;
    }
    return $randomNumber1;
}
