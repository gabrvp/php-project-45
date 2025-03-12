<?php

namespace BrainGames\Games\Calc;

use function cli\line;
use function cli\prompt;

function playCalc()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('What is the result of the expression?');
    for ($i = 0; $i < 3; $i++) {
        $randomNumb1 = rand(1, 99);
        $randomNumb2 = rand(1, 99);
        $arrayOfOperations = ['+', '-', '*'];
        $key = array_rand($arrayOfOperations, 1);
        $randomOpearation = $arrayOfOperations[$key];
        $expressionString = "{$randomNumb1} {$randomOpearation} {$randomNumb2}";
        line("Question: {$expressionString}");
        switch ($randomOpearation) {
            case '+':
                $reportCorrect = $randomNumb1 + $randomNumb2;
                break;
            case '-':
                $reportCorrect = $randomNumb1 - $randomNumb2;
                break;
            case '*':
                $reportCorrect = $randomNumb1 * $randomNumb2;
                break;
        }
        $reportOfUser = prompt('Your answer');
        if ($reportCorrect == $reportOfUser) {
            line('Correct!');
        } else {
            line("{$reportOfUser} is wrong answer ;(. Correct answer was {$reportCorrect}");
            line("Let's try again, %s!", $name);
            return;
        }
    }
    line("Congratulations, %s!", $name);
}
