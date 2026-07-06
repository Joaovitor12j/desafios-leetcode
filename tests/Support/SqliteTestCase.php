<?php

declare(strict_types=1);

namespace LeetCode\Tests\Support;

use PDO;
use PHPUnit\Framework\TestCase;

abstract class SqliteTestCase extends TestCase
{
    protected function bootDatabase(string $problemDir): PDO
    {
        $pdo = new PDO('sqlite::memory:');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $pdo->exec((string) file_get_contents($problemDir . '/schema.sql'));
        $pdo->exec((string) file_get_contents($problemDir . '/seed.sql'));

        return $pdo;
    }

    /**
     * @return list<array<string, mixed>>
     */
    protected function runSolutionQuery(PDO $pdo, string $problemDir): array
    {
        $sql = (string) file_get_contents($problemDir . '/solution.sql');
        $statement = $pdo->query($sql);

        return $statement !== false ? $statement->fetchAll(PDO::FETCH_ASSOC) : [];
    }
}
