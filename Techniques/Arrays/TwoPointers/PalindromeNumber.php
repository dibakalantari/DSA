<?php

// Given an integer x, return true if x is a palindrome, and false otherwise.

class Solution {
    function isPalindrome($x): bool {
        if($x == 0) {
            return true;
        }

        if($x<0) {
            return false;
        }

        $x = (string)$x;
        $begin = 0;
        $end = strlen($x)-1;

        while($begin < $end) {
            if($x[$begin] != $x[$end]) {
                return false;
            }

            $begin++;
            $end--;
        }

        return true;
    }
}


print_r((new Solution())->isPalindrome(121));