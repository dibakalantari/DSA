<?php

//Google Question
// Find the first Recurring character
// Given an array = [2,5,1, 2, 3,5,1,2,4]
// It should return 2

// Given an array = [2,1,1, 2, 3,5,1,2,4]
// It should return 1

// Given an array = [2,3,4,5]
// It should return undefined

function test (array $inpoutArray){
    $hashMap = [];

    for($i=0;$i<count($inpoutArray);$i++) {
        if(isset($hashMap[$inpoutArray[$i]])) {
            return $inpoutArray[$i];
        }

        $hashMap[$inpoutArray[$i]] = 1;
    }

    return null;
}

print_r(test([ ]));