<?php

namespace TerminalCoffe\SmallerWebHexagon;

use PDO;
use TerminalCoffe\SmallerWebHexagon\RatingSources\DatabaseRatingSource;
use TerminalCoffe\SmallerWebHexagon\RatingSources\InMemoryRatingSource;
use TerminalCoffe\SmallerWebHexagon\RatingSources\JsonFileRatingSource;

class ApplicationFactory
{
    public static function memory(): InMemoryRatingSource
    {
        return new InMemoryRatingSource();
    }

    public static function database($path = null): DatabaseRatingSource
    {
        $dbPath = $path ?? "../store/rates.db";
        return new DatabaseRatingSource(
            new PDO("sqlite:$dbPath")
        );
    }

    public static function jsonFile($path = null): JsonFileRatingSource
    {
        return new JsonFileRatingSource($path ?? "../store/rates.json");
    }

    public static function from(PortForRatingSource $dataSource): Result
    {
        return new Result($dataSource);
    }

    public static function fromMemory(): Result
    {
        return self::from(self::memory());
    }

    public static function fromDatabase($path = null): Result
    {
        return self::from(self::database($path));
    }

    public static function fromJsonFile($path = null): Result
    {
        return self::from(self::jsonFile($path));
    }

    public static function webWith(PortForRatingSource $dataSource): RateController
    {
        return new RateController(self::from($dataSource));
    }

    public static function webWithMemory(): RateController
    {
        return self::webWith(self::memory());
    }

    public static function webWithDatabase(): RateController
    {
        return self::webWith(self::database());
    }

    public static function webWithJsonFile(): RateController
    {
        return self::webWith(self::jsonFile());
    }
}
