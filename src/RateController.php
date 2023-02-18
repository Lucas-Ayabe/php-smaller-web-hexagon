<?php

namespace TerminalCoffe\SmallerWebHexagon;


class RateController
{
    public function __construct(private Result $interactor)
    {
    }

    public function handle(): void
    {
        $value = filter_input(INPUT_GET, 'value', FILTER_VALIDATE_FLOAT);

        extract(['result' => $this->interactor->calculate($value ?? 0)]);
        include 'views/result.php';
        exit;
    }
}
