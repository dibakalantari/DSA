<?php

// Given a string s, find the length of the longest substring without repeating characters.
// example: Input: s = "abcabcbb" Output: 3

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring($s) {
        $maximumLength = 0;
        $map = [];
        $sLength = strlen($s);

        $begin =0;
        $end = 0;

        while($end< $sLength) {
            if(isset($map[$s[$end]])) {
                while($s[$end] !== $s[$begin]) {
                    unset($map[$s[$begin]]);
                    $begin++;
                }
                $begin++;  
            } else{
                $map[$s[$end]] = 1;
            }
            if(($end - $begin)+1 > $maximumLength) {$maximumLength = ($end - $begin)+1;}
            $end++;
        }

        return $maximumLength;
    }
}

print_r((new Solution())->lengthOfLongestSubstring("abcabcbb"));