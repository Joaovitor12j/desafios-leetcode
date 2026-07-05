<?php

declare(strict_types=1);

namespace LeetCode\PHP\P303;

use PHPUnit\Framework\Attributes\RunClassInSeparateProcess;
use PHPUnit\Framework\TestCase;
use NumArray303;

#[RunClassInSeparateProcess]
final class SolutionTest extends TestCase
{
    protected function setUp(): void
    {
        require_once __DIR__ . '/NumArray303.php';
    }

    public function testExampleOne(): void
    {
        $numArray = new NumArray303([-2, 0, 3, -5, 2, -1]);

        self::assertSame(1, $numArray->sumRange(0, 2));
        self::assertSame(-1, $numArray->sumRange(2, 5));
        self::assertSame(-3, $numArray->sumRange(0, 5));
    }

    public function testSingleIndexRangeReturnsElementItself(): void
    {
        $numArray = new NumArray303([-2, 0, 3, -5, 2, -1]);

        self::assertSame(-2, $numArray->sumRange(0, 0));
    }

    public function testSingleElementArray(): void
    {
        $numArray = new NumArray303([5]);

        self::assertSame(5, $numArray->sumRange(0, 0));
    }
}
