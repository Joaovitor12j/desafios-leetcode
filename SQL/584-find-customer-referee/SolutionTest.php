<?php

declare(strict_types=1);

namespace LeetCode\SQL\P584;

use LeetCode\Tests\Support\SqliteTestCase;
use PDO;

final class SolutionTest extends SqliteTestCase
{
    private PDO $pdo;

    protected function setUp(): void
    {
        $this->pdo = $this->bootDatabase(__DIR__);
    }

    public function testExcludesCustomersReferredByCustomerTwo(): void
    {
        $rows = $this->runSolutionQuery($this->pdo, __DIR__);

        self::assertSame(
            [
                ['name' => 'Will'],
                ['name' => 'Jane'],
                ['name' => 'Bill'],
                ['name' => 'Zack'],
            ],
            $rows,
        );
    }

    public function testIncludesCustomersWithNullReferee(): void
    {
        $this->pdo->exec('DELETE FROM Customer');
        $this->pdo->exec(
            "INSERT INTO Customer (id, name, referee_id) VALUES (1, 'Solo', NULL)",
        );

        self::assertSame(
            [['name' => 'Solo']],
            $this->runSolutionQuery($this->pdo, __DIR__),
        );
    }
}
