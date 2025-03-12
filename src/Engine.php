<?php

namespace BrainGames\Engine;

use function BrainGames\Cli\welcome;
use function cli\line;

const NUMBER_OF_ROUNDS = 3; #Кол-во раундов в каждой игре

function executeGameTemplate(string $descriptionOfGame, callable $functionOfGame): void
{
    $name = welcome();
    line($descriptionOfGame);

    for ($i = 0; $i < NUMBER_OF_ROUNDS; $i++) {
        #"Вытаскиваем" ответ пользователя и корректный ответ из функции конкретной игры
        [$answerOfUser, $answerCorrect] = $functionOfGame();
        if ($answerOfUser === $answerCorrect) {
            line('Correct!');
        } else {
            line("'{$answerOfUser}' is wrong answer ;(. Correct answer was '{$answerCorrect}'");
            line("Let's try again, {$name}");
            return;
        }
    }
    line("Congratulations, {$name}");
    return;
}
