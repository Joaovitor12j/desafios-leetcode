<?php

declare(strict_types=1);

namespace LeetCode\PHP\P258;

use PHPUnit\Framework\Attributes\RunClassInSeparateProcess;
use PHPUnit\Framework\TestCase;
use Solution258;

#[RunClassInSeparateProcess]
final class SolutionTest extends TestCase
{
    private Solution258 $solution;

    protected function setUp(): void
    {
        require_once __DIR__ . '/Solution258.php';

        $this->solution = new Solution258();
    }

    public function testExampleOne(): void
    {
        self::assertSame(2, $this->solution->addDigits(38));
    }

    public function testExampleTwo(): void
    {
        self::assertSame(0, $this->solution->addDigits(0));
    }

    public function testSingleDigitReturnsItself(): void
    {
        self::assertSame(5, $this->solution->addDigits(5));
    }

    public function testMultipleOfNineReturnsNine(): void
    {
        self::assertSame(9, $this->solution->addDigits(18));
    }

    public function testMaximumValueWithinConstraints(): void
    {
        self::assertSame(1, $this->solution->addDigits(2147483647));
    }
}
