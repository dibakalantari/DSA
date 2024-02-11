<?php

// fibonacci implementation using Memoization
// This approach brings fibonacci time complexity down from O(n^2) to O(n)
// We are using more space complexity though because we are saving data into cache

function fibonacciMasterDP1() {
    $cache = [];

    $fib = function($n) use (&$cache, &$fib) {
        if (isset($cache[$n])) {
            return $cache[$n];
        } else {
            if ($n < 2) {
                $cache[$n] = $n;
                return $n;
            } else {
                $cache[$n] = $fib($n - 1) + $fib($n - 2);
                return $cache[$n];
            }
        }
    };

    return $fib;
}

// $fibonacci = fibonacciMasterDP1();
// $n = 8;
// echo "Fibonacci of {$n}: " . $fibonacci($n) . "\n";


// Now we implement fibonacci using bottom up approach which is another dynamic programming approach
function fibonacciDP2($n) {
    $answer = [0,1];
    for($i=2; $i<=$n; $i++) {
        $answer[$i] = $answer[$i-1] + $answer[$i-2];
    }

    return array_pop($answer);
}

print_r(fibonacciDP2(8));