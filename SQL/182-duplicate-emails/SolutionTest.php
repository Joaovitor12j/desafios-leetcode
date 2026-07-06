<?php

declare(strict_types=1);

namespace LeetCode\SQL\P182;

use LeetCode\Tests\Support\SqliteTestCase;
use PDO;

final class SolutionTest extends SqliteTestCase
{
    private PDO $pdo;

    protected function setUp(): void
    {
        $this->pdo = $this->bootDatabase(__DIR__);
    }

    public function testFindsDuplicateEmails(): void
    {
        $rows = $this->runSolutionQuery($this->pdo, __DIR__);

        self::assertSame(
            [
                ['Email' => 'john@example.com'],
            ],
            $rows,
        );
    }

    public function testReturnsEmptyWhenNoDuplicates(): void
    {
        $this->pdo->exec('DELETE FROM Person');
        $this->pdo->exec(
            "INSERT INTO Person (id, email) VALUES (1, 'a@example.com'), (2, 'b@example.com')",
        );

        self::assertSame([], $this->runSolutionQuery($this->pdo, __DIR__));
    }
}
