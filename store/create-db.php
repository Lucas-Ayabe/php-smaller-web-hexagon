<?php

$conn = new PDO("sqlite:./rates.db");
$query = <<<SQL
    CREATE TABLE IF NOT EXISTS rates (
        id   INTEGER PRIMARY KEY,
        rate NUMERIC    NOT NULL,
        value INTEGER   NOT NULL
    );
SQL;

$conn->exec($query);

$stmt = $conn->prepare("INSERT INTO rates (rate, value) VALUES (?, ?)");
$stmt->execute([3, 300]);
$stmt->execute([3.5, 350]);
