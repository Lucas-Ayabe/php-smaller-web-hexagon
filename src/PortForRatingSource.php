<?php

namespace TerminalCoffe\SmallerWebHexagon;

interface PortForRatingSource
{
    public function getRateFromValue(float $value): float;
}
