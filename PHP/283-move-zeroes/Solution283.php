<?php

declare(strict_types=1);

final class Solution283
{

    public function moveZeroes(array &$nums): void
    {
        $insertPos = 0;

        for ($i = 0; $i < count($nums); $i++) {
            if ($nums[$i] !== 0) {
                [$nums[$insertPos], $nums[$i]] = [$nums[$i], $nums[$insertPos]];
                $insertPos++;
            }
        }
    }
}
