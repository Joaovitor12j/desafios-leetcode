<?php

declare(strict_types=1);

final class Solution219
{

    public function containsNearbyDuplicate(array $nums, int $k): bool
    {
        $lastIndex = [];

        foreach ($nums as $i => $num) {
            if (isset($lastIndex[$num]) && $i - $lastIndex[$num] <= $k) {
                return true;
            }

            $lastIndex[$num] = $i;
        }

        return false;
    }
}
