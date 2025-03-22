<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\runGame;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';
const MIN_VALUE = 1;
const MAX_VALUE = 99;

function playPrime(): void
{
    $playRound = function () {
        $questionText = $randomNumber = rand(MIN_VALUE, MAX_VALUE);
        $answerCorrect = checkPrime($randomNumber) ? 'yes' : 'no';
        return [$questionText, $answerCorrect];
    };
    runGame(DESCRIPTION, $playRound);
}

function checkPrime(int $randomNumber): bool
{
    if ($randomNumber < 2) {
        return false;
    }
    for ($i = 2; $i <= $randomNumber / 2; $i++) {
        if ($randomNumber % $i === 0) {
            return false;
        }
    }
    return true;
}
