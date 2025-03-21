<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\executeGameTemplate;

const DESCRIPTION_OF_GAME = 'Answer "yes" if given number is prime. Otherwise answer "no".'; #Описание игры
const MIN_VALUE = 1; #Минимальное значение для рандомного числа
const MAX_VALUE = 99; #Максимальное значение для рандомного числа

function playPrime(): void
{
    $playRound = function () {
        $questionText = $randomNumber = rand(MIN_VALUE, MAX_VALUE);
        $answerCorrect = checkPrime($randomNumber) ? 'yes' : 'no';
        return [$questionText, $answerCorrect];
    };
    executeGameTemplate(DESCRIPTION_OF_GAME, $playRound);
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
