<?php

namespace BrainGames\Engine;

use function BrainGames\Cli\welcome;
use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

function runGame(string $description, callable $playGame): void
{
    $name = welcome();
    line($description);
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        [$question, $answer] = $playGame();
        line("Question: {$question}");
        $answerOfUser = prompt('Your answer');
        if ($answerOfUser != $answer) {
            line("'{$answerOfUser}' is wrong answer ;(. Correct answer was '{$answer}'");
            line("Let's try again, {$name}!");
            return;
        }
        line('Correct!');
    }
    line("Congratulations, {$name}!");
}
