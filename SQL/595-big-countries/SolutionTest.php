<?php

declare(strict_types=1);

namespace LeetCode\SQL\P595;

use LeetCode\Tests\Support\SqliteTestCase;
use PDO;

final class SolutionTest extends SqliteTestCase
{
    private PDO $pdo;

    protected function setUp(): void
    {
        $this->pdo = $this->bootDatabase(__DIR__);
    }

    public function testFindsCountriesByPopulationOrArea(): void
    {
        $rows = $this->runSolutionQuery($this->pdo, __DIR__);

        self::assertSame(
            [
                ['name' => 'Afghanistan', 'population' => 25500100, 'area' => 652230],
                ['name' => 'Algeria', 'population' => 37100000, 'area' => 2381741],
            ],
            $rows,
        );
    }

    public function testExcludesSmallCountries(): void
    {
        $this->pdo->exec('DELETE FROM World');
        $this->pdo->exec(
            "INSERT INTO World (name, continent, area, population, gdp) VALUES ('Tiny', 'Europe', 100, 1000, 1)",
        );

        self::assertSame([], $this->runSolutionQuery($this->pdo, __DIR__));
    }
}
