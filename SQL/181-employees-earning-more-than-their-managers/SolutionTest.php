<?php

declare(strict_types=1);

namespace LeetCode\SQL\P181;

use LeetCode\Tests\Support\SqliteTestCase;
use PDO;

final class SolutionTest extends SqliteTestCase
{
    private PDO $pdo;

    protected function setUp(): void
    {
        $this->pdo = $this->bootDatabase(__DIR__);
    }

    public function testFindsEmployeesEarningMoreThanTheirManager(): void
    {
        $rows = $this->runSolutionQuery($this->pdo, __DIR__);

        self::assertSame(
            [
                ['Employee' => 'Joe'],
            ],
            $rows,
        );
    }

    public function testEmployeesWithoutManagerAreExcluded(): void
    {
        $this->pdo->exec('DELETE FROM Employee');
        $this->pdo->exec(
            "INSERT INTO Employee (id, name, salary, managerId) VALUES (1, 'Solo', 100000, NULL)",
        );

        $rows = $this->runSolutionQuery($this->pdo, __DIR__);

        self::assertSame([], $rows);
    }
}
