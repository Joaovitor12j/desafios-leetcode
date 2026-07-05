<?php

declare(strict_types=1);

namespace LeetCode\PHP\P283;

use PHPUnit\Framework\Attributes\RunClassInSeparateProcess;
use PHPUnit\Framework\TestCase;
use Solution283;

#[RunClassInSeparateProcess]
final class SolutionTest extends TestCase
{
    private Solution283 $solution;

    protected function setUp(): void
    {
        require_once __DIR__ . '/Solution283.php';

        $this->solution = new Solution283();
    }

    public function testExampleOne(): void
    {
        $nums = [0, 1, 0, 3, 12];

        $this->solution->moveZeroes($nums);

        self::assertSame([1, 3, 12, 0, 0], $nums);
    }

    public function testExampleTwo(): void
    {
        $nums = [0];

        $this->solution->moveZeroes($nums);

        self::assertSame([0], $nums);
    }

    public function testArrayWithoutZeroesStaysUnchanged(): void
    {
        $nums = [1, 2, 3];

        $this->solution->moveZeroes($nums);

        self::assertSame([1, 2, 3], $nums);
    }

    public function testArrayOfOnlyZeroesStaysUnchanged(): void
    {
        $nums = [0, 0, 0];

        $this->solution->moveZeroes($nums);

        self::assertSame([0, 0, 0], $nums);
    }
}
