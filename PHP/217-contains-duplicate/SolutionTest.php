<?php

declare(strict_types=1);

namespace LeetCode\PHP\P217;

use PHPUnit\Framework\Attributes\RunClassInSeparateProcess;
use PHPUnit\Framework\TestCase;
use Solution217;

#[RunClassInSeparateProcess]
final class SolutionTest extends TestCase
{
    private Solution217 $solution;

    protected function setUp(): void
    {
        require_once __DIR__ . '/Solution217.php';

        $this->solution = new Solution217();
    }

    public function testExampleOne(): void
    {
        self::assertTrue($this->solution->containsDuplicate([1, 2, 3, 1]));
    }

    public function testExampleTwo(): void
    {
        self::assertFalse($this->solution->containsDuplicate([1, 2, 3, 4]));
    }

    public function testExampleThree(): void
    {
        self::assertTrue($this->solution->containsDuplicate([1, 1, 1, 3, 3, 4, 3, 2, 4, 2]));
    }

    public function testSingleElementMinimumLength(): void
    {
        self::assertFalse($this->solution->containsDuplicate([1]));
    }

    public function testHandlesNegativeValues(): void
    {
        self::assertTrue($this->solution->containsDuplicate([-1, 5, -1, 3]));
    }
}
