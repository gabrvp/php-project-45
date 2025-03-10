<?php

namespace BrainGames\Games\Even;

use function cli\line;
use function cli\prompt;

const MIN_VALUE = 1; #Минимальное значение для рандомного числа
const MAX_VALUE = 99; #Максимальное значение для рандомного числа
const NUMBER_OF_CORRECT = 3; #Количество верных ответов для победы

function playEven()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Answer "yes" if the number is even, otherwise answer "no".');
    for ($i = 0; $i < NUMBER_OF_CORRECT; $i++) {
        $randomNumb = rand(MIN_VALUE, MAX_VALUE); #Генерируем случайное число
        line("Question: {$randomNumb}");
        $randomNumb % 2 === 0 ? $reportCorrect = 'yes' : $reportCorrect = 'no';
        $reportOfUser = prompt('Your answer');
        if ($reportCorrect === $reportOfUser) {
            line('Correct!');
        } else {
            line("'%s!' is wrong answer ;(. Correct answer was '%s!'", $reportOfUser, $reportCorrect);
            line("Let's try again, %s!", $name);
            return;
        }
    }
    line("Congratulations, %s!", $name);
}
