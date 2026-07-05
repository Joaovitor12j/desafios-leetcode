<?php

declare(strict_types=1);

final class Solution222
{

    public function countNodes(?TreeNode $root): int
    {
        if ($root === null) {
            return 0;
        }

        $leftHeight = $this->leftmostSpineLength($root);
        $rightHeight = $this->rightmostSpineLength($root);

        if ($leftHeight === $rightHeight) {
            return (2 ** $leftHeight) - 1;
        }

        return 1 + $this->countNodes($root->left) + $this->countNodes($root->right);
    }

    private function leftmostSpineLength(?TreeNode $node): int
    {

        $length = 0;

        while ($node !== null) {
            $length++;
            $node = $node->left;
        }

        return $length;
    }

    private function rightmostSpineLength(?TreeNode $node): int
    {

        $length = 0;

        while ($node !== null) {
            $length++;
            $node = $node->right;
        }

        return $length;
    }
}
