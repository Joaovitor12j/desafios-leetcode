<?php

declare(strict_types=1);

namespace LeetCode\PHP\P222;

use PHPUnit\Framework\Attributes\RunClassInSeparateProcess;
use PHPUnit\Framework\TestCase;
use TreeNode;
use Solution222;

#[RunClassInSeparateProcess]
final class SolutionTest extends TestCase
{
    private Solution222 $solution;

    protected function setUp(): void
    {
        require_once __DIR__ . '/TreeNode.php';
        require_once __DIR__ . '/Solution222.php';

        $this->solution = new Solution222();
    }

    public function testExampleOne(): void
    {
        $root = new TreeNode(
            1,
            new TreeNode(2, new TreeNode(4), new TreeNode(5)),
            new TreeNode(3, new TreeNode(6), null)
        );

        self::assertSame(6, $this->solution->countNodes($root));
    }

    public function testExampleTwo(): void
    {
        self::assertSame(0, $this->solution->countNodes(null));
    }

    public function testExampleThree(): void
    {
        self::assertSame(1, $this->solution->countNodes(new TreeNode(1)));
    }

    public function testPerfectTreeOfSevenNodes(): void
    {
        $root = new TreeNode(
            1,
            new TreeNode(2, new TreeNode(4), new TreeNode(5)),
            new TreeNode(3, new TreeNode(6), new TreeNode(7))
        );

        self::assertSame(7, $this->solution->countNodes($root));
    }
}
