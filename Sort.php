<?php

$numbers = [99, 44, 6 , 2, 1, 5, 63, 87, 283, 4, 0];

function bubbleSort(array $numbers) {
    $length = count($numbers);

    for($i = 0 ; $i< $length ; $i++) {
        for($j = 0 ; $j< $length ; $j++) {
            if($numbers[$j] > $numbers[$j+1]) {
                $temp = $numbers[$j];
                $numbers[$j] = $numbers[$j+1];
                $numbers[$j+1] = $temp;
            }
        }
    }

    return $numbers;
}

// print_r(bubbleSort($numbers));

function selectionSort(array $numbers) {
    $length = count($numbers);

    for($i = 0 ; $i< $length ; $i++) {
        $min = $i;
        for($j = $i+1 ; $j< $length ; $j++) {
            if($numbers[$j] < $numbers[$min]){
                $min = $j;
            }
        }

        $temp = $numbers[$i];
        $numbers[$i] = $numbers[$min];
        $numbers[$min] = $temp;
    }

    return $numbers;
}

// print_r(selectionSort($numbers));

function insertionSort(array $numbers) {
    $length = count($numbers);

    for($i = 1; $i< $length; $i++) {
        if($numbers[$i] < $numbers[0]) {
            // move number to the first position
            array_unshift($numbers, array_splice($numbers, $i, 1)[0]);
        }

        // find where number should go
        for($j = 1; $j< $i; $j++) {
            if($numbers[$j-1] < $numbers[$i] && $numbers[$i] < $numbers[$j]) {
                // move number to the right spot
                array_splice($numbers, $j, 0, array_splice($numbers, $i, 1)[0]);
            }
        }
    }

    return $numbers;
}

print_r(insertionSort($numbers));