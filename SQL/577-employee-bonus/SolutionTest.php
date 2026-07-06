<?php

declare(strict_types=1);

namespace LeetCode\SQL\P577;

use LeetCode\Tests\Support\SqliteTestCase;
use PDO;

final class SolutionTest extends SqliteTestCase
{
    private PDO $pdo;

    protected function setUp(): void
    {
        $this->pdo = $this->bootDatabase(__DIR__);
    }

    public function testReportsEmployeesWithBonusBelowOneThousandOrNone(): void
    {
        $rows = $this->runSolutionQuery($this->pdo, __DIR__);

        self::assertSame(
            [
                ['name' => 'John', 'bonus' => null],
                ['name' => 'Dan', 'bonus' => 500],
                ['name' => 'Brad', 'bonus' => null],
            ],
            $rows,
        );
    }

    public function testExcludesEmployeesWithBonusOfExactlyOneThousand(): void
    {
        $this->pdo->exec('DELETE FROM Bonus');
        $this->pdo->exec('INSERT INTO Bonus (empId, bonus) VALUES (1, 1000)');
        $this->pdo->exec('DELETE FROM Employee WHERE empId != 1');

        self::assertSame([], $this->runSolutionQuery($this->pdo, __DIR__));
    }
}
