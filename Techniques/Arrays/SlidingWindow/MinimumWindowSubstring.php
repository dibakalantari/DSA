<?php

// Given two strings s and t of lengths m and n respectively, 
// return the minimum window substring of s such that every character in t (including duplicates) is included in
// the window. If there is no such substring, return the empty string "".

// Example: Input: s = "ADOBECODEBANC", t = "ABC" Output: "BANC"

class Solution
{

    /**
     * @param String $s
     * @param String $t
     * @return String
     */
    public function minWindow($s, $t)
    {
        $map = array_fill(0, 128, 0);
        for ($i = 0; $i < strlen($t); $i++) {
            $map[ord($t[$i])]++; // ord method return ascii code of the character
        }

        $counter = strlen($t);
        $begin = 0;
        $end = 0;
        $d = PHP_INT_MAX; // length of the substring
        $head = 0;

        while ($end < strlen($s)) {
            if ($map[ord($s[$end])] > 0){
                $counter--;
            } 
            $map[ord($s[$end])]--;
            $end++;
    
            while ($counter == 0) {
                if ($end - $begin < $d) { // d is the smallest window length found so far
                    $d = $end - ($head = $begin); // head is the beginning of the smallest window found so far
                }

                if ($map[ord($s[$begin])] == 0){ // by moving begin one item forward I'm removing an item from my window
                    // If that item is one of the items in the map, then we need it and we need to add one item to the counter
                    // to continue the bigger while loop and look for this remove item
                    $counter++;
                } 
                $map[ord($s[$begin])]++;
                $begin++;
            }
        }

        return $d == PHP_INT_MAX ? "" : substr($s, $head, $d);
    }
}

print_r((new Solution())->minWindow("ADOBECODEBANC", "ABC"));
