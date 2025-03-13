<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\executeGameTemplate;
use function cli\line;
use function cli\prompt;

const DESCRIPTION_OF_GAME = 'What number is missing in the progression?'; #Описание игры
const MIN_LENGTH_OF_ARRAY = 5; #Минимальная длина генерируемого массива
const MAX_LENGTH_OF_ARRAY = 10; #Максимальная длина генерируемого массива
const MIN_STEP_SIZE = 1; #Минимальная длина шага
const MAX_STEP_SIZE = 10; #Максимальная длина шага
const MIN_VALUE_FIRST_ELEMENT = -5; #Минимальное значение первого элемента
const MAX_VALUE_FIRST_ELEMENT = 5; #Максимальное значение первого элемента

function generateArray(): array
{
    $generatedArray = []; #Сгенерированный массив. Задаем пустую переменную
    $lengthOfArray = rand(MIN_LENGTH_OF_ARRAY, MAX_LENGTH_OF_ARRAY);
    $stepSize = rand(MIN_STEP_SIZE, MAX_STEP_SIZE);
    $valueFirstElement = rand(MIN_VALUE_FIRST_ELEMENT, MAX_VALUE_FIRST_ELEMENT);
    for ($i = 0; $i < $lengthOfArray; $i++) {
        $generatedArray[$i] = $valueFirstElement + $i * $stepSize;
    }
    return [$generatedArray, $lengthOfArray];
}

function playProgression(): void
{
    $round = function () {
        [$generatedArray, $lengthOfArray] = generateArray();
        $randomArrayIndex = rand(0, $lengthOfArray - 1); #Выбираем индекс случайного элемента массива
        $answerCorrect = $generatedArray[$randomArrayIndex];
        $generatedArray[$randomArrayIndex] = '..';
        $stringGeneratedArray = implode(' ', $generatedArray);
        line("Question: {$stringGeneratedArray}");
        $answerOfUser = (int) prompt('Your answer');
        return [$answerOfUser, $answerCorrect];
    };
    executeGameTemplate(DESCRIPTION_OF_GAME, $round);
}
