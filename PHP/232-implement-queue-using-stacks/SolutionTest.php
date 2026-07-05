<?php

declare(strict_types=1);

namespace LeetCode\PHP\P232;

use PHPUnit\Framework\Attributes\RunClassInSeparateProcess;
use PHPUnit\Framework\TestCase;
use MyQueue232;

#[RunClassInSeparateProcess]
final class SolutionTest extends TestCase
{
    private MyQueue232 $queue;

    protected function setUp(): void
    {
        require_once __DIR__ . '/MyQueue232.php';

        $this->queue = new MyQueue232();
    }

    public function testExampleOne(): void
    {
        $this->queue->push(1);
        $this->queue->push(2);

        self::assertSame(1, $this->queue->peek());
        self::assertSame(1, $this->queue->pop());
        self::assertFalse($this->queue->empty());
    }

    public function testNewQueueIsEmpty(): void
    {
        self::assertTrue($this->queue->empty());
    }

    public function testQueueBecomesEmptyAfterDrainingAllElements(): void
    {
        $this->queue->push(1);
        $this->queue->pop();

        self::assertTrue($this->queue->empty());
    }

    public function testMaintainsFifoOrderAcrossInterleavedPushAndPop(): void
    {
        $this->queue->push(1);
        $this->queue->push(2);
        self::assertSame(1, $this->queue->pop());

        $this->queue->push(3);
        self::assertSame(2, $this->queue->pop());
        self::assertSame(3, $this->queue->peek());
        self::assertSame(3, $this->queue->pop());
        self::assertTrue($this->queue->empty());
    }
}
