<?php

declare(strict_types=1);

namespace LeetCode\PHP\P171;

use PHPUnit\Framework\Attributes\RunClassInSeparateProcess;
use PHPUnit\Framework\TestCase;
use Solution171;

#[RunClassInSeparateProcess]
final class SolutionTest extends TestCase
{
    private Solution171 $solution;

    protected function setUp(): void
    {
        require_once __DIR__ . '/Solution171.php';

        $this->solution = new Solution171();
    }

    public function testExampleOne(): void
    {
        self::assertSame(1, $this->solution->titleToNumber('A'));
    }

    public function testExampleTwo(): void
    {
        self::assertSame(28, $this->solution->titleToNumber('AB'));
    }

    public function testExampleThree(): void
    {
        self::assertSame(701, $this->solution->titleToNumber('ZY'));
    }

    public function testSingleLetterBoundaries(): void
    {
        self::assertSame(1, $this->solution->titleToNumber('A'));
        self::assertSame(26, $this->solution->titleToNumber('Z'));
    }

    public function testFirstTwoLetterColumn(): void
    {
        self::assertSame(27, $this->solution->titleToNumber('AA'));
    }

    public function testMaximumLengthWithinConstraints(): void
    {
        self::assertSame(2147483647, $this->solution->titleToNumber('FXSHRXW'));
    }
}
