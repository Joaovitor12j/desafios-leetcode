<?php

declare(strict_types=1);

final class Solution205
{

    public function isIsomorphic(string $s, string $t): bool
    {
        $mapSToT = [];
        $mapTToS = [];

        for ($i = 0; $i < strlen($s); $i++) {
            $charS = $s[$i];
            $charT = $t[$i];

            if (isset($mapSToT[$charS])) {
                if ($mapSToT[$charS] !== $charT) {
                    return false;
                }
            } elseif (isset($mapTToS[$charT])) {
                return false;
            } else {
                $mapSToT[$charS] = $charT;
                $mapTToS[$charT] = $charS;
            }
        }

        return true;
    }
}
