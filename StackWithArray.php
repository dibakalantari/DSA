<?php

class Stack {
    private $stackArray;

    public function __construct() {
        $this->stackArray = [];
    }

    public function push($data) {
        $this->stackArray[] = $data;
        return $this;
    }

    public function pop() {
       array_pop($this->stackArray);
       return $this;
    } 

    public function peek() {
        $length = count($this->stackArray);
        return $this->stackArray[$length-1];
    }
}

$myStack = new Stack();
$myStack->push('google')->push('udemy')->push('discord');
print_r($myStack->pop()->pop()->pop()); 
// print_r($myStack->peek());