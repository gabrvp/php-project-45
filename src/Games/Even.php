<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\executeGameTemplate;

const DESCRIPTION_OF_GAME = 'Answer "yes" if the number is even, otherwise answer "no".';
const MIN_VALUE = 1;
const MAX_VALUE = 99;

function playEven(): void
{
    $playRound = function () {
        $questionText = $randomNumber = rand(MIN_VALUE, MAX_VALUE);
        $answerCorrect = $randomNumber % 2 === 0 ? 'yes' : 'no';

        return [$questionText, $answerCorrect];
    };
    executeGameTemplate(DESCRIPTION_OF_GAME, $playRound);
}
