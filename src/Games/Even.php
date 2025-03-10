<?php

namespace BrainGames\Games\Even;

use function cli\line;
use function cli\prompt;
use function BrainGames\Cli\welcome;

const MIN_VALUE = 1;
const MAX_VALUE = 99;

function playEven()
{
    
    welcome();
    $result = 0;
    line('Answer "yes" if the number is even, otherwise answer "no".');
}