<?php

declare(strict_types=1);

namespace LeetCode\SQL\P196;

use LeetCode\Tests\Support\SqliteTestCase;
use PDO;

final class SolutionTest extends SqliteTestCase
{
    private PDO $pdo;

    protected function setUp(): void
    {
        $this->pdo = $this->bootDatabase(__DIR__);
    }

    public function testDeletesDuplicateEmailsKeepingSmallestId(): void
    {
        $this->pdo->exec((string) file_get_contents(__DIR__ . '/solution.sql'));

        $rows = $this->pdo->query('SELECT id, email FROM Person ORDER BY id')->fetchAll(PDO::FETCH_ASSOC);

        self::assertSame(
            [
                ['id' => 1, 'email' => 'john@example.com'],
                ['id' => 2, 'email' => 'bob@example.com'],
            ],
            $rows,
        );
    }

    public function testKeepsAllRowsWhenNoDuplicates(): void
    {
        $this->pdo->exec('DELETE FROM Person');
        $this->pdo->exec(
            "INSERT INTO Person (id, email) VALUES (1, 'a@example.com'), (2, 'b@example.com')",
        );

        $this->pdo->exec((string) file_get_contents(__DIR__ . '/solution.sql'));

        $rows = $this->pdo->query('SELECT id, email FROM Person ORDER BY id')->fetchAll(PDO::FETCH_ASSOC);

        self::assertSame(
            [
                ['id' => 1, 'email' => 'a@example.com'],
                ['id' => 2, 'email' => 'b@example.com'],
            ],
            $rows,
        );
    }
}
