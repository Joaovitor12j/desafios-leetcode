<?php

declare(strict_types=1);

namespace LeetCode\SQL\P596;

use LeetCode\Tests\Support\SqliteTestCase;
use PDO;

final class SolutionTest extends SqliteTestCase
{
    private PDO $pdo;

    protected function setUp(): void
    {
        $this->pdo = $this->bootDatabase(__DIR__);
    }

    public function testFindsClassesWithAtLeastFiveStudents(): void
    {
        $rows = $this->runSolutionQuery($this->pdo, __DIR__);

        self::assertSame(
            [['class' => 'Math']],
            $rows,
        );
    }

    public function testExcludesClassWithExactlyFourStudents(): void
    {
        $this->pdo->exec('DELETE FROM Courses');
        $this->pdo->exec(
            "INSERT INTO Courses (student, class) VALUES ('A', 'Art'), ('B', 'Art'), ('C', 'Art'), ('D', 'Art')",
        );

        self::assertSame([], $this->runSolutionQuery($this->pdo, __DIR__));
    }
}
