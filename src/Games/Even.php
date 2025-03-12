<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\executeGameTemplate;
use function cli\line;
use function cli\prompt;

const MIN_VALUE = 1; #Минимальное значение для рандомного числа
const MAX_VALUE = 99; #Максимальное значение для рандомного числа
const DESCRIPTION_OF_GAME = 'Answer "yes" if the number is even, otherwise answer "no".'; #Описание игры

function playEven(): void
{
    $round = function () {
        $randomNumb = rand(MIN_VALUE, MAX_VALUE); #Генерируем случайное число
        line("Question: {$randomNumb}");
        $answerOfUser = prompt('Your answer');
        $answerCorrect = $randomNumb % 2 === 0 ? 'yes' : 'no';

        return [$answerOfUser, $answerCorrect];
    };
    executeGameTemplate(DESCRIPTION_OF_GAME, $round);
}
