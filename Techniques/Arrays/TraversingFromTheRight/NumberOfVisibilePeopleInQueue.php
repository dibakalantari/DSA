<?php

// There are n people standing in a queue, and they numbered from 0 to n - 1 in left to right order.
//  You are given an array heights of distinct integers where heights[i] represents the height of the ith person.
// A person can see another person to their right in the queue if everybody in between is shorter
// than both of them. More formally, the ith person can see the jth person 
// if i < j and min(heights[i], heights[j]) > max(heights[i+1], heights[i+2], ..., heights[j-1]).
// Return an array answer of length n where answer[i] is the number of people the ith person can see to their 
// right in the queue.

// ex: Input:[10,6,8,5,11,9] Output:[3,1,2,1,1,0]
// person 0 can see person 1, 2, 14
// person 1 can see person 2
// person 2 can see person 3, 4
// person 3 can see person 4
// person 4 can see person 5
// person 5 wont be able to see anyone because there is no one left to their right

class Solution {
    /**
     * @param Integer[] $heights
     * @return Integer[]
     */
    function canSeePersonsCount($heights) {
        $stack = new SplStack();
        $length = count($heights);
        $answer = array_fill(0, $length, 0);

        for($i=$length-1;$i>=0;$i--) {
            while(!$stack->isEmpty() && $heights[$i] > $heights[$stack->top()]) {
                $stack->pop();
                $answer[$i]++;
            }

            if(!$stack->isEmpty()) {
                $answer[$i]++;
            }

            $stack->push($i);
        }


        return $answer;
    }
}

print_r((new Solution())->canSeePersonsCount([10,6,8,5,11,9]));

// brute force approach:
// class Solution {
//     /**
//      * @param Integer[] $heights
//      * @return Integer[]
//      */
//     function canSeePersonsCount($heights) {
//         $queue =[];
//         $answer = [];
//         $length = count($heights);

//         for($i = $length - 1; $i >= 0; $i--) {
//             $count = 0;
//             $max = 0;

//             for($j = count($queue)-1 ; $j >= 0;$j--) {
//                 if($queue[$j] > $max) {
//                     $max = $queue[$j];
//                 }

//                 if($queue[$j] < $max) {
//                     continue;
//                 }

//                 $count++;
//                 if($queue[$j] >= $heights[$i]) {
//                     break;
//                 }
//             }

//             $answer[$i] = $count;
//             array_push($queue, $heights[$i]);
//         }

//         return array_reverse($answer);
//     }
// }

// print_r((new Solution())->canSeePersonsCount([10,6,8,5,11,9]));