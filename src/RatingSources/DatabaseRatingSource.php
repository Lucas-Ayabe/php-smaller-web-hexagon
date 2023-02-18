<?php

namespace TerminalCoffe\SmallerWebHexagon\RatingSources;

use PDO;
use TerminalCoffe\SmallerWebHexagon\PortForRatingSource;

class DatabaseRatingSource implements PortForRatingSource
{
    public function __construct(private PDO $connection)
    {
    }

    public function getRateFromValue(float $value): float
    {
        $statement = $this
            ->connection
            ->prepare("SELECT * FROM rates WHERE value = ?");
        $statement->execute([$value]);

        $row = $statement->fetch(PDO::FETCH_ASSOC);
        if (!isset($row['rate'])) {
            return 1;
        }

        return (float) $row['rate'];
    }
}
