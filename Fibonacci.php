<?php

// Given a number N return the index value of the fibonacci sequence, where the sequence is :
// 0, 1, 1, 2, 3, 5, 8, 13, 21, 34, 55, 89, 144
// The pattern of the sequence is that each value is the sum of the 2 previous values, that means that for N=5 -> 2+3

function fibonacciIterative($n) { // O(n)
    $fibonacciSequence = [0, 1];

    for($i = 2; $i<=$n ; $i++) {
        $fibonacciSequence[$i] = $fibonacciSequence[$i-1] + $fibonacciSequence[$i-2];
    }

    return $fibonacciSequence[$n];
}

function fibonacciIterativeRecursive($n) { // O(2^n)
    if($n < 2) {
        return $n;
    }

    return fibonacciIterativeRecursive($n-1) + fibonacciIterativeRecursive($n-2);
}

// print_r(fibonacciIterative(8)); // expects 21
print_r(fibonacciIterativeRecursive(8));