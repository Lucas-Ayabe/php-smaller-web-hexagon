<?php

namespace TerminalCoffe\SmallerWebHexagon;

readonly class ResultResponse
{
    public function __construct(
        public float $rate,
        public int|float $result
    ) {
    }
}
