<?php

declare(strict_types=1);

final class Solution217
{

    public function containsDuplicate(array $nums): bool
    {
        $seen = [];

        foreach ($nums as $num) {
            if (isset($seen[$num])) {
                return true;
            }

            $seen[$num] = true;
        }

        return false;
    }
}
