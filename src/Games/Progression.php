<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\runGame;

const DESCRIPTION = 'What number is missing in the progression?';
const MIN_LENGTH_OF_ARRAY = 5;
const MAX_LENGTH_OF_ARRAY = 10;
const MIN_STEP_SIZE = 1;
const MAX_STEP_SIZE = 10;
const MIN_VALUE_FIRST_ELEMENT = -5;
const MAX_VALUE_FIRST_ELEMENT = 5;

function generateArray(): array
{
    $progressionNumbers = [];
    $lengthOfArray = rand(MIN_LENGTH_OF_ARRAY, MAX_LENGTH_OF_ARRAY);
    $stepSize = rand(MIN_STEP_SIZE, MAX_STEP_SIZE);
    $valueFirstElement = rand(MIN_VALUE_FIRST_ELEMENT, MAX_VALUE_FIRST_ELEMENT);
    for ($i = 0; $i < $lengthOfArray; $i++) {
        $progressionNumbers[$i] = $valueFirstElement + $i * $stepSize;
    }
    return [$progressionNumbers, $lengthOfArray];
}

function playProgression(): void
{
    $playRound = function () {
        [$progressionNumbers, $lengthOfArray] = generateArray();
        $randomArrayIndex = rand(0, $lengthOfArray - 1);
        $answerCorrect = $progressionNumbers[$randomArrayIndex];
        $progressionNumbers[$randomArrayIndex] = '..';
        $questionText = implode(' ', $progressionNumbers);
        return [$questionText, $answerCorrect];
    };
    runGame(DESCRIPTION, $playRound);
}
