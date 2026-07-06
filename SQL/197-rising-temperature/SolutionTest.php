<?php

declare(strict_types=1);

namespace LeetCode\SQL\P197;

use LeetCode\Tests\Support\SqliteTestCase;
use PDO;

final class SolutionTest extends SqliteTestCase
{
    private PDO $pdo;

    protected function setUp(): void
    {
        $this->pdo = $this->bootDatabase(__DIR__);
    }

    public function testFindsDaysWithRisingTemperature(): void
    {
        $rows = $this->runSolutionQuery($this->pdo, __DIR__);

        self::assertSame(
            [
                ['id' => 2],
                ['id' => 4],
            ],
            $rows,
        );
    }

    public function testIgnoresNonConsecutiveDates(): void
    {
        $this->pdo->exec('DELETE FROM Weather');
        $this->pdo->exec(
            "INSERT INTO Weather (id, recordDate, temperature) VALUES (1, '2015-01-01', 10), (2, '2015-01-03', 25)",
        );

        self::assertSame([], $this->runSolutionQuery($this->pdo, __DIR__));
    }
}
