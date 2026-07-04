<?php

declare(strict_types=1);

final class Solution203
{

    public function removeElements(?ListNode $head, int $val): ?ListNode
    {

        $dummy = new ListNode(0, $head);
        $current = $dummy;

        while ($current->next !== null) {
            if ($current->next->val === $val) {
                $current->next = $current->next->next;
            } else {
                $current = $current->next;
            }
        }

        return $dummy->next;
    }
}
