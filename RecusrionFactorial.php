<?php

// Write two functions that find the factorial of any number. One should use recursive, the other should just use a for loop
// 5! = 5*4*3*2*1

// time complexity for both of these functions is O(n)

function findFactorialRecursive($number) {
    if($number == 2) { // We can of course check if the number is 1 or zero here as well, but with checking for number 2 we are decreasing loops
        return 2;
    }

    return $number * findFactorialRecursive($number - 1);
}

function findFactorialIterative($number) {
    $result = 1;
    for($i = $number; $i> 1 ; $i--) {
        $result *= $i;
    }

    return $result;
}

print_r(findFactorialRecursive(3));
// print_r(findFactorialIterative(2));