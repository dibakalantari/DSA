<?php

// Given a collection of numbers, you have to find the matching pairs that is equal to the given sum

// example: input: [1,2,3,9] sum: 8 => this doesnt have any matching pair
// example: input: [1,2,4,4] sum: 8 => [4,4] 

echo findMatchingPairs([1,2,4,9], 8) ? "true" : "false";

// The brute force approach, complexity: O(n^2)
// function findMatchingPairs(array $input, int $sum) {
//     $matches = [];

//     for($i=0; $i< count($input); $i++) {
//         for($j=$i+1; $j< count($input); $j++) {
//             if($input[$i] + $input[$j] == $sum) {
//                 return true;
//             }
//         }
//     }

//     return false;
// }


// Better
// function findMatchingPairs(array $input, int $sum) {
//     $matches = new stdClass(); 

//     for($i=0; $i< count($input); $i++) {
//         if(!$matches->{$input[$i]}){
//             $matches->{$input[$i]} = true;
//         }
//     }

//     for($i=0; $i< count($input); $i++) {
//         $complement = $sum - $input[$i];
//         if($matches->{$complement}){
//             return true;
//         }
//     }

//     return false;
// }


//The best approach
function findMatchingPairs(array $input, int $sum) {
    $matches = new stdClass(); 

    for($i=0; $i< count($input); $i++) {
        if($matches->{$input[$i]}){
            return true;
        }

        $complement = $sum - $input[$i];
        $matches->$complement = true;
    }

    return false;
}