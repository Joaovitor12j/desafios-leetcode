<?php

declare(strict_types=1);

final class Solution {

    public function titleToNumber(string $columnTitle): int {

        $result = 0;
        for ($i = 0; $i < strlen($columnTitle); $i++) {
            $result = $result * 26 + (ord($columnTitle[$i]) - ord('A') + 1);
        }

        return $result;
    }
}
