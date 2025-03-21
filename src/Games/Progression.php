<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\executeGameTemplate;

const DESCRIPTION_OF_GAME = 'What number is missing in the progression?'; #Описание игры
const MIN_LENGTH_OF_ARRAY = 5; #Минимальная длина генерируемого массива
const MAX_LENGTH_OF_ARRAY = 10; #Максимальная длина генерируемого массива
const MIN_STEP_SIZE = 1; #Минимальная длина шага
const MAX_STEP_SIZE = 10; #Максимальная длина шага
const MIN_VALUE_FIRST_ELEMENT = -5; #Минимальное значение первого элемента
const MAX_VALUE_FIRST_ELEMENT = 5; #Максимальное значение первого элемента

function generateArray(): array
{
    $progressionNumbers = []; #Сгенерированный массив. Задаем пустую переменную
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
        $randomArrayIndex = rand(0, $lengthOfArray - 1); #Выбираем индекс случайного элемента массива
        $answerCorrect = $progressionNumbers[$randomArrayIndex];
        $progressionNumbers[$randomArrayIndex] = '..';
        $questionText = implode(' ', $progressionNumbers);
        return [$questionText, $answerCorrect];
    };
    executeGameTemplate(DESCRIPTION_OF_GAME, $playRound);
}
