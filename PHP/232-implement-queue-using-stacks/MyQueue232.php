<?php

declare(strict_types=1);

final class MyQueue232
{
    /** @var int[] */
    private array $in = [];

    /** @var int[] */
    private array $out = [];

    public function push(int $x): void
    {
        $this->in[] = $x;
    }

    public function pop(): int
    {
        $this->shiftInToOutIfNeeded();

        return array_pop($this->out);
    }

    public function peek(): int
    {
        $this->shiftInToOutIfNeeded();

        return $this->out[count($this->out) - 1];
    }

    public function empty(): bool
    {
        return count($this->in) === 0 && count($this->out) === 0;
    }

    private function shiftInToOutIfNeeded(): void
    {
        if (count($this->out) > 0) {
            return;
        }

        while (count($this->in) > 0) {
            $this->out[] = array_pop($this->in);
        }
    }
}
