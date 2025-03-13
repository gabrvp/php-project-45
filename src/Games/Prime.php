<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\executeGameTemplate;
use function cli\line;
use function cli\prompt;

const DESCRIPTION_OF_GAME = 'Answer "yes" if given number is prime. Otherwise answer "no".'; #Описание игры
const MIN_VALUE = 1; #Минимальное значение для рандомного числа
const MAX_VALUE = 99; #Максимальное значение для рандомного числа

function playPrime(): void
{
    $round = function () {
        $randomNumb = rand(MIN_VALUE, MAX_VALUE);
        line("Question: {$randomNumb}");
        $answerOfUser = prompt('Your answer');
        $answerCorrect = checkPrime($randomNumb) ? 'yes' : 'no';
        return [$answerOfUser, $answerCorrect];
    };
    executeGameTemplate(DESCRIPTION_OF_GAME, $round);
}

function checkPrime(int $randomNumb): bool
{
    if ($randomNumb < 2) {
        return false;
    }
    for ($i = 2; $i <= $randomNumb / 2; $i++) {
        if ($randomNumb % $i === 0) {
            return false;
        }
    }
    return true;
}
