<?php

namespace TerminalCoffe\SmallerWebHexagon;

class Result
{
    public function __construct(
        private PortForRatingSource $ratingSource
    ) {
    }

    public function calculate(int|float $value): ResultResponse
    {
        $rate = $this->ratingSource->getRateFromValue($value);

        return new ResultResponse(
            rate: $rate,
            result: round($value * $rate, 1)
        );
    }
}
