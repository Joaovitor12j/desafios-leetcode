<?php

declare(strict_types=1);

final class Solution258
{

    public function addDigits(int $num): int
    {
        if ($num === 0) {
            return 0;
        }

        return 1 + ($num - 1) % 9;
    }
}
