<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\runGame;

const DESCRIPTION = 'What number is missing in the progression?';
const MIN_LENGTH = 5;
const MAX_LENGTH = 10;
const MIN_STEP = 1;
const MAX_STEP = 10;
const MIN_FIRST_ELEMENT = -5;
const MAX_FIRST_ELEMENT = 5;

function playProgression(): void
{
    $playRound = function () {
        [$numbers, $length] = generateProgression();
        $randomIndex = rand(0, $length - 1);
        $answer = $numbers[$randomIndex];
        $numbers[$randomIndex] = '..';
        $question = implode(' ', $numbers);
        return [$question, $answer];
    };
    runGame(DESCRIPTION, $playRound);
}

function generateProgression(): array
{
    $numbers = [];
    $length = rand(MIN_LENGTH, MAX_LENGTH);
    $step = rand(MIN_STEP, MAX_STEP);
    $firstElement = rand(MIN_FIRST_ELEMENT, MAX_FIRST_ELEMENT);
    for ($i = 0; $i < $length; $i++) {
        $numbers[$i] = $firstElement + $i * $step;
    }
    return [$numbers, $length];
}
