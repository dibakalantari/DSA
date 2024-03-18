<?php

// Given an array of intervals intervals where intervals[i] = [starti, endi], return the minimum number of 
// intervals you need to remove to make the rest of the intervals non-overlapping.
// ex: intervals = [[1,2],[2,3],[3,4],[1,3]] Output: 1

class Solution
{
    public function eraseOverlapIntervals($intervals)
    {
        $overlaps = 0;
        usort($intervals, fn($a, $b) => $a[1] < $b[1] ? -1 : 1);
        // [[1,2],[1,3],[2,3],[3,4]]
        $lastEnd = PHP_INT_MIN;

        foreach ($intervals as $interval) {
            if ($interval[0] >= $lastEnd) {
                $lastEnd = $interval[1];
                continue;
            }
            $overlaps++;
        }

        return $overlaps;
    }
}

print_r((new Solution())->eraseOverlapIntervals([[1,2],[2,3],[3,4],[1,3]]));