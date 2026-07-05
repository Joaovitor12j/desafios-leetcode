<?php

declare(strict_types=1);

final class NumArray303
{
    /** @var int[] */
    private array $prefix;

    public function __construct(array $nums)
    {
        $this->prefix = [0];

        foreach ($nums as $i => $num) {
            $this->prefix[$i + 1] = $this->prefix[$i] + $num;
        }
    }

    public function sumRange(int $left, int $right): int
    {
        return $this->prefix[$right + 1] - $this->prefix[$left];
    }
}
