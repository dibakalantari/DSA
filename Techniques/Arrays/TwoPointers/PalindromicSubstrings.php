<?php

// Given a string s, return the number of palindromic substrings in it.
// A string is a palindrome when it reads the same backward as forward.
// A substring is a contiguous sequence of characters within the string.

// example: Input: s = "abc" => output: 3
// Input: s = "aaa" Output: 6

class Solution
{
    public int $count;

    public function __construct() {
        $this->count = 0;
    }

    public function countSubstrings($s)
    {
        if ($s == null) {
            return 0;
        }
        $length = strlen($s);

        for ($i = 0; $i < $length; $i++) {
            $this->getPalindromes($s, $i, $i);
            $this->getPalindromes($s, $i, $i+1);
        }

        return $this->count;
    }

    private function getPalindromes(string $s, string $left, string $right)
    {
        while($left >= 0 && $right < strlen($s) && $s[$left] == $s[$right]) {
            $this->count++;
            $left--;
            $right++;
        } 
    }
}

print_r((new Solution())->countSubstrings('aaa'));
