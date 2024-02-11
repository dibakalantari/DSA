<?php

// Create a function that reverses a string:
// 'Hi My name is Diba' should be:
// 'abid si eman yM iH'

function reverseString($string){
    //check input
    if(strlen($string) < 2 || !is_string($string)) {
        return 'hmm that is not good!';
    } 
 
    $newString = [];
    for($i=strlen($string)-1; $i>=0 ; $i--) {
        $newString[] = $string[$i];
    }

    return implode('', $newString);
}

// echo reverseString('Hi My name is Diba');


// Another approach:

function reverseString2($string) {
    // check the input here too, but I will skip that part
    return strrev($string);
}

// echo reverseString2('Hi My name is Diba');


// Another approach:

function reverseString3($string) {
    // check the input here too, but I will skip that part
    $array = str_split($string);
    $reversedArray = array_reverse($array);
    return implode('', $reversedArray);
}

echo reverseString3('Hi My name is Diba');