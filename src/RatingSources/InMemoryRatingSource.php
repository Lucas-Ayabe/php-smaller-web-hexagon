<?php

namespace TerminalCoffe\SmallerWebHexagon\RatingSources;

use TerminalCoffe\SmallerWebHexagon\PortForRatingSource;

class InMemoryRatingSource implements PortForRatingSource
{
    public function getRateFromValue(float $value): float
    {
        return match (true) {
            $value <= 100 => 1.01,
            $value > 100 => 1.5,
            default => 1
        };
    }
}
