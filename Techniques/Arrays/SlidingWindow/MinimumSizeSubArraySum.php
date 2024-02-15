<?php

// Given an array of positive integers nums and a positive integer target, return the minimal length of a 
// subarray whose sum is greater than or equal to target. If there is no such subarray, return 0 instead.

// Example: Input: target = 7, nums = [2,3,1,2,4,3] Output: 2
// Input: target = 11, nums = [1,1,1,1,1,1,1,1] Output: 0

class Solution {

    /**
     * @param Integer $target
     * @param Integer[] $nums
     * @return Integer
     */
    function minSubArrayLen($target, $nums) {
        $minimumLength = PHP_INT_MAX;

        $begin = 0;
        $end = 0;
        $numsLength = count($nums);
        $sum = 0;

        while($end < $numsLength) {
            $sum += $nums[$end];

            while($sum >= $target) {
                $currentLength = $end - $begin + 1;
                $sum -= $nums[$begin];
                $begin++;

                if($currentLength < $minimumLength) {
                    $minimumLength = $currentLength;
                }
            }

            $end++;
        }

        if($minimumLength == PHP_INT_MAX) {
            return 0;
        }
    
        return $minimumLength;
    }
}

print_r((new Solution())->minSubArrayLen(7, [2,3,1,2,4,3]));