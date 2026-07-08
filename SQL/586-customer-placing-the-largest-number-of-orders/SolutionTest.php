<?php

declare(strict_types=1);

namespace LeetCode\SQL\P586;

use LeetCode\Tests\Support\SqliteTestCase;
use PDO;

final class SolutionTest extends SqliteTestCase
{
    private PDO $pdo;

    protected function setUp(): void
    {
        $this->pdo = $this->bootDatabase(__DIR__);
    }

    public function testFindsCustomerWithMostOrders(): void
    {
        $rows = $this->runSolutionQuery($this->pdo, __DIR__);

        self::assertSame(
            [['customer_number' => 3]],
            $rows,
        );
    }

    public function testSingleCustomerWithSingleOrder(): void
    {
        $this->pdo->exec('DELETE FROM Orders');
        $this->pdo->exec('INSERT INTO Orders (order_number, customer_number) VALUES (1, 9)');

        self::assertSame(
            [['customer_number' => 9]],
            $this->runSolutionQuery($this->pdo, __DIR__),
        );
    }
}
