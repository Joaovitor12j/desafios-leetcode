<?php

declare(strict_types=1);

namespace LeetCode\SQL\P183;

use LeetCode\Tests\Support\SqliteTestCase;
use PDO;

final class SolutionTest extends SqliteTestCase
{
    private PDO $pdo;

    protected function setUp(): void
    {
        $this->pdo = $this->bootDatabase(__DIR__);
    }

    public function testFindsCustomersWhoNeverOrdered(): void
    {
        $rows = $this->runSolutionQuery($this->pdo, __DIR__);

        self::assertSame(
            [
                ['Customers' => 'Henry'],
                ['Customers' => 'Max'],
            ],
            $rows,
        );
    }

    public function testReturnsEmptyWhenEveryoneOrdered(): void
    {
        $this->pdo->exec('DELETE FROM Orders');
        $this->pdo->exec(
            'INSERT INTO Orders (id, customerId) VALUES (1, 1), (2, 2), (3, 3), (4, 4)',
        );

        self::assertSame([], $this->runSolutionQuery($this->pdo, __DIR__));
    }
}
