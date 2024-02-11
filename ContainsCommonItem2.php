<?php

// Given 2 arrays, return back if they have any item in common

$array1 = ['a',null,'c'];
$array2 = ['b',[],'x','y'];

$result = containsCommonItem2($array1,null);
echo $result ? "true" : "false";

function containsCommonItem2($array1, $array2) {
    $map = new stdClass(); // associative array would work here too

    if(!$array1 || !$array2) {
        return false;
    }

    for($i=0; $i<count($array1); $i++) {
        if(!isset($map->{$array1[$i]})) {
            $map->{$array1[$i]} = true;
        }
    }

    for($i=0; $i<count($array2); $i++) {
        if($map->{$array2[$i]}) {
            return true;
        }
    }

    return false;
}