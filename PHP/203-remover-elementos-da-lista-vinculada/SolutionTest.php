<?php

declare(strict_types=1);

namespace LeetCode\PHP\P203;

use PHPUnit\Framework\Attributes\RunClassInSeparateProcess;
use PHPUnit\Framework\TestCase;
use ListNode;
use Solution203;

#[RunClassInSeparateProcess]
final class SolutionTest extends TestCase
{
    private Solution203 $solution;

    protected function setUp(): void
    {
        require_once __DIR__ . '/ListNode.php';
        require_once __DIR__ . '/Solution203.php';

        $this->solution = new Solution203();
    }

    public function testExampleOne(): void
    {
        $head = $this->buildList([1, 2, 6, 3, 4, 5, 6]);

        $result = $this->solution->removeElements($head, 6);

        self::assertSame([1, 2, 3, 4, 5], $this->toArray($result));
    }

    public function testExampleTwo(): void
    {
        $result = $this->solution->removeElements(null, 1);

        self::assertNull($result);
    }

    public function testExampleThree(): void
    {
        $head = $this->buildList([7, 7, 7, 7]);

        $result = $this->solution->removeElements($head, 7);

        self::assertNull($result);
    }

    public function testNoMatchingValueKeepsListUnchanged(): void
    {
        $head = $this->buildList([1, 2, 3]);

        $result = $this->solution->removeElements($head, 50);

        self::assertSame([1, 2, 3], $this->toArray($result));
    }

    public function testRemovesRepeatedValuesFromHead(): void
    {
        $head = $this->buildList([1, 1, 2, 1]);

        $result = $this->solution->removeElements($head, 1);

        self::assertSame([2], $this->toArray($result));
    }

    public function testSingleNodeListWithMinimumConstraintValues(): void
    {
        $head = $this->buildList([1]);

        $result = $this->solution->removeElements($head, 1);

        self::assertNull($result);
    }

    /**
     * @param array<int, int> $values
     */
    private function buildList(array $values): ?ListNode
    {
        $dummy = new ListNode();
        $current = $dummy;

        foreach ($values as $value) {
            $current->next = new ListNode($value);
            $current = $current->next;
        }

        return $dummy->next;
    }

    /**
     * @return array<int, int>
     */
    private function toArray(?ListNode $head): array
    {
        $values = [];

        while ($head !== null) {
            $values[] = $head->val;
            $head = $head->next;
        }

        return $values;
    }
}
