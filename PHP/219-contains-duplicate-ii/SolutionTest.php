<?php

declare(strict_types=1);

namespace LeetCode\PHP\P219;

use PHPUnit\Framework\Attributes\RunClassInSeparateProcess;
use PHPUnit\Framework\TestCase;
use Solution219;

#[RunClassInSeparateProcess]
final class SolutionTest extends TestCase
{
    private Solution219 $solution;

    protected function setUp(): void
    {
        require_once __DIR__ . '/Solution219.php';

        $this->solution = new Solution219();
    }

    public function testExampleOne(): void
    {
        self::assertTrue($this->solution->containsNearbyDuplicate([1, 2, 3, 1], 3));
    }

    public function testExampleTwo(): void
    {
        self::assertTrue($this->solution->containsNearbyDuplicate([1, 0, 1, 1], 1));
    }

    public function testExampleThree(): void
    {
        self::assertFalse($this->solution->containsNearbyDuplicate([1, 2, 3, 1, 2, 3], 2));
    }

    public function testZeroWindowNeverMatches(): void
    {
        self::assertFalse($this->solution->containsNearbyDuplicate([1, 1, 1], 0));
    }

    public function testDuplicateExactlyAtWindowBoundary(): void
    {
        self::assertTrue($this->solution->containsNearbyDuplicate([1, 2, 3, 4, 1], 4));
    }

    public function testDuplicateJustOutsideWindow(): void
    {
        self::assertFalse($this->solution->containsNearbyDuplicate([1, 2, 3, 4, 1], 3));
    }
}
