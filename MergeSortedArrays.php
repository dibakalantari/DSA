<?php


// input: 2 arrays, both sorted
// output: sort and merged result of these 2 arrays

// example: 
// input: [0,3,4,31], [4,6,30]
// output: [0,3,4,4,6,30,31]

// Solution 1
function mergeSortedArrays($array1, $array2) {
    // check input, even if one of the arrays is empty, it means that we should only return the other one
    if(sizeof($array1) == 0) {
        return $array2;
    }

    if(sizeof($array2) == 0) {
        return $array1;
    }

    $mergedArray = [];
    $array1Item = $array1[0];
    $array2Item = $array2[0];
    $i = 1;
    $j= 1;

    while($array1Item || $array2Item){
        if(($array1Item !== null && ($array1Item < $array2Item)) || !$array2Item) {
            $mergedArray[] = $array1Item;
            if(!isset($array1[$i])) {
                $array1Item = null;
            } else{
                $array1Item = $array1[$i];
                $i++;
            }
        } elseif($array2Item !== null){
            $mergedArray[] = $array2Item;
            if(!isset($array2[$j])) {
                $array2Item = null;
            } else{
                $array2Item = $array2[$j];
                $j++;
            }
        }
    }
    
    return $mergedArray;
}

print_r(mergeSortedArrays([0,3,4,31], [4,6,30]));

// Solution 2
// function mergeSortedArrays($array1, $array2) {
//     $mergedArray = array_merge($array1, $array2);

//     asort($mergedArray);
//     return $mergedArray;
// }

// print_r(mergeSortedArrays([0,3,4,31], [4,6,30]));
