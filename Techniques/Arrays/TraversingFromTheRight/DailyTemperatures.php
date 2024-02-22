<?php

// Given an array of integers temperatures represents the daily temperatures, 
// return an array answer such that answer[i] is the number of days you have to wait after 
// the ith day to get a warmer temperature.
// If there is no future day for which this is possible, keep answer[i] == 0 instead.

// ex: Input: temperatures = [73,74,75,71,69,72,76,73] Output: [1, 1, 4, 2, 1, 1, 0,0]
class Solution {

    /**
     * @param Integer[] $temperatures
     * @return Integer[]
     */
    function dailyTemperatures($temperatures) {
        $length = count($temperatures);
        $result = array_fill(0, $length, 0);
        $stack = [];

        for($i = $length-1; $i>=0; $i--) {
            while(!empty($stack) && $temperatures[$i] >= $temperatures[end($stack)]) {
                array_pop($stack);
            }

            if(!empty($stack)) {
                $result[$i] = end($stack) - $i;
            } 

            array_push($stack, $i);
        }

        return $result;
    }
}

print_r((new Solution())->dailyTemperatures([73,74,75,71,69,72,76,73]));