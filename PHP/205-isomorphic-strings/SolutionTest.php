<?php

declare(strict_types=1);

namespace LeetCode\PHP\P205;

use PHPUnit\Framework\Attributes\RunClassInSeparateProcess;
use PHPUnit\Framework\TestCase;
use Solution205;

#[RunClassInSeparateProcess]
final class SolutionTest extends TestCase
{
    private Solution205 $solution;

    protected function setUp(): void
    {
        require_once __DIR__ . '/Solution205.php';

        $this->solution = new Solution205();
    }

    public function testExampleOne(): void
    {
        self::assertTrue($this->solution->isIsomorphic('egg', 'add'));
    }

    public function testExampleTwo(): void
    {
        self::assertFalse($this->solution->isIsomorphic('foo', 'bar'));
    }

    public function testExampleThree(): void
    {
        self::assertTrue($this->solution->isIsomorphic('paper', 'title'));
    }

    public function testRejectsManyToOneMapping(): void
    {
        self::assertFalse($this->solution->isIsomorphic('badc', 'baba'));
    }

    public function testAllowsCharacterMappedToItself(): void
    {
        self::assertTrue($this->solution->isIsomorphic('abc', 'abc'));
    }

    public function testSingleCharacterMinimumConstraint(): void
    {
        self::assertTrue($this->solution->isIsomorphic('a', 'a'));
    }
}
