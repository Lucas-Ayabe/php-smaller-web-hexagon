<?php

use TerminalCoffe\SmallerWebHexagon\ApplicationFactory;

test('hexagon driving memory source', function () {
    $hex = ApplicationFactory::fromMemory();
    $bellowOrEqual100Result = $hex->calculate(100);
    $greaterThan100Result = $hex->calculate(150);

    expect($bellowOrEqual100Result->rate)->toBe(1.01);
    expect($bellowOrEqual100Result->result)->toBe(101.0);

    expect($greaterThan100Result->rate)->toBe(1.5);
    expect($greaterThan100Result->result)->toBe(225.0);
});

test('hexagon driving json file source', function () {
    $hex = ApplicationFactory::fromJsonFile(__DIR__ . "/../store/rates.json");
    $equal100Result = $hex->calculate(100);
    $equal101Result = $hex->calculate(101);

    expect($equal100Result->rate)->toBe(2.0);
    expect($equal100Result->result)->toBe(200.0);

    expect($equal101Result->rate)->toBe(2.1);
    expect($equal101Result->result)->toBe(212.1);
});

test('hexagon driving database source', function () {
    $hex = ApplicationFactory::fromDatabase(__DIR__ . "/../store/rates.db");
    $equal100Result = $hex->calculate(300);
    $equal101Result = $hex->calculate(350);

    expect($equal100Result->rate)->toBe(3.0);
    expect($equal100Result->result)->toBe(900.0);

    expect($equal101Result->rate)->toBe(3.5);
    expect($equal101Result->result)->toBe(1225.0);
});
