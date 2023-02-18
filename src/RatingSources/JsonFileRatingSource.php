<?php

namespace TerminalCoffe\SmallerWebHexagon\RatingSources;

use InvalidArgumentException;
use TerminalCoffe\SmallerWebHexagon\PortForRatingSource;

class JsonFileRatingSource implements PortForRatingSource
{
    public function __construct(private string $filePath)
    {
    }

    public function getRateFromValue(float $value): float
    {
        $rates = json_decode(file_get_contents($this->filePath), true);

        foreach ($rates as ['rate' => $rate, 'value' => $rateValue]) {
            if ((float) $rateValue === (float) $value) {
                return $rate;
            }
        }

        return 1;
    }
}
