<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\runGame;

const DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';
const MIN_VALUE = 1;
const MAX_VALUE = 99;

function playEven(): void
{
    $playRound = function () {
        $question = $randomNumber = rand(MIN_VALUE, MAX_VALUE);
        $answer = $randomNumber % 2 === 0 ? 'yes' : 'no';

        return [$question, $answer];
    };
    runGame(DESCRIPTION, $playRound);
}
