<?php

declare(strict_types=1);

namespace LeetCode\SQL\P175;

use LeetCode\Tests\Support\SqliteTestCase;
use PDO;

final class SolutionTest extends SqliteTestCase
{
    private PDO $pdo;

    protected function setUp(): void
    {
        $this->pdo = $this->bootDatabase(__DIR__);
    }

    public function testCombinesPersonAndAddressViaLeftJoin(): void
    {
        $rows = $this->runSolutionQuery($this->pdo, __DIR__);

        self::assertSame(
            [
                ['firstName' => 'Allen', 'lastName' => 'Wang', 'city' => null, 'state' => null],
                ['firstName' => 'Bob', 'lastName' => 'Alice', 'city' => 'New York City', 'state' => 'New York'],
            ],
            $rows,
        );
    }
}
