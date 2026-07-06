<?php

declare(strict_types=1);

namespace LeetCode\SQL\P511;

use LeetCode\Tests\Support\SqliteTestCase;
use PDO;

final class SolutionTest extends SqliteTestCase
{
    private PDO $pdo;

    protected function setUp(): void
    {
        $this->pdo = $this->bootDatabase(__DIR__);
    }

    public function testFindsFirstLoginPerPlayer(): void
    {
        $rows = $this->runSolutionQuery($this->pdo, __DIR__);

        self::assertSame(
            [
                ['player_id' => 1, 'first_login' => '2016-03-01'],
                ['player_id' => 2, 'first_login' => '2017-06-25'],
                ['player_id' => 3, 'first_login' => '2016-03-02'],
            ],
            $rows,
        );
    }

    public function testSinglePlayerSingleActivity(): void
    {
        $this->pdo->exec('DELETE FROM Activity');
        $this->pdo->exec(
            "INSERT INTO Activity (player_id, device_id, event_date, games_played) VALUES (9, 1, '2020-01-01', 3)",
        );

        self::assertSame(
            [['player_id' => 9, 'first_login' => '2020-01-01']],
            $this->runSolutionQuery($this->pdo, __DIR__),
        );
    }
}
