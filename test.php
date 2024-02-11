<?php

$object1 = ['a' => true];
$object2 = &$object1;

$object1['a'] = 'hello';

print_r($object1);
print_r($object2);

