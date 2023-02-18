<?php

require_once __DIR__ . "/../vendor/autoload.php";

use \TerminalCoffe\SmallerWebHexagon\ApplicationFactory;

$source = filter_input(INPUT_GET, 'source');
$app = match ($source) {
    'database' => ApplicationFactory::webWithDatabase(),
    'json' => ApplicationFactory::webWithJsonFile(),
    'memory', null => ApplicationFactory::webWithMemory(),
    default => ApplicationFactory::webWithMemory(),
};

$app->handle();
