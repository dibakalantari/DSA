<?php

// Given an array of intervals where intervals[i] = [starti, endi], merge all overlapping intervals,
// and return an array of the non-overlapping intervals that cover all the intervals in the input.

// example: Input: intervals = [[1,3],[2,6],[8,10],[15,18]] Output: [[1,6],[8,10],[15,18]]

class Solution
{
    public function merge($intervals)
    {
        sort($intervals);
        $length = count($intervals);

        for($i=0 ; $i<$length-1; $i++) {
            [$start, $end] = $intervals[$i];
            [$start2, $end2] = $intervals[$i+1];

            if($end >= $start2) {
                unset($intervals[$i]);
                $intervals[$i+1] = [$start, max($end, $end2)];
            }
        }

        return $intervals;
    }
}

print_r((new Solution())->merge([[2,3],[4,5],[6,7],[8,9],[1,10]]));
