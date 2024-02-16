<?php

// Given an array nums with n objects colored red, white, or blue,
// sort them in-place so that objects of the same color are adjacent, with the colors in the order red, white, and blue.
// We will use the integers 0, 1, and 2 to represent the color red, white, and blue, respectively.

//Example: Input: nums = [2,0,2,1,1,0] Output: [0,0,1,1,2,2]

function sortColors($nums)
{
    $colors = [
        0 => 0,
        1 => 0,
        2 => 0,
    ];

    foreach ($nums as $number) {
        $colors[$number]++;
    }

    $nums = [];
    foreach ($colors as $color => $count) {
        while ($count > 0) {
            $nums[] = $color;
            $count--;
        }
    }

    return $nums;
}

print_r(sortColors([2, 0, 2, 1, 1, 0]));
